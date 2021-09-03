<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Department;
use App\Models\Lab;
use App\Models\Note;
use App\Models\Post;
use App\Models\PostView;
use App\Models\User;
use App\Models\Varsity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->limit(80)->get()->paginate(8);
        $varsities=Varsity::inRandomOrder()->take(5)->get()->sortByDesc('created_at');
        return view('post.index',compact('posts','varsities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $varsities= Varsity::all();
        return view('adminpanel.post.addpost',compact('varsities'));
    }

    public function typePost($type,$request,$varsity_id,$department_id,$course_id){
        return $type->posts()->create([
            'title'=> $request->get('title'),
            'slug'=>$request->get('slug'),
            'body'=>$request->get('body'),
            'metadescription'=>$request->get('metadescription'),
            'metatag'=>$request->get('metatag'),
            'user_id'=>Auth::id(),
            'varsity_id'=>$varsity_id,
            'department_id'=>$department_id,
            'course_id'=>$course_id
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=> 'required',
            'slug'=>'required|unique:posts',
            'body'=>'required',
            'type'=>'required',
            'type_id'=>'required',
            'metadescription'=>'required',
            'metatag'=>'required',
            'varsity'=>'required',
            'department'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);   
        }
        else{
            $varsity_id=Varsity::where('short_name','=',$request->get('varsity'))->firstorfail()->id;
            $department_id=Department::where('short_name','=',$request->get('department'))->firstorfail()->id;
            $course_id=Course::where('course_code','=',$request->get('course'))->firstorfail()->id;
            if($request->get('type')=='lab'){
                $lab=Lab::findOrFail($request->get('type_id'));
                $post=$this->typePost($lab,$request,$varsity_id,$department_id,$course_id);
                if($post){
                    return response()->json([
                        'message' => 'You have successfully added Lab',
                    ],200);
                }
            }
            else if($request->get('type')=='assignment'){
                $assignment=Assignment::findOrFail($request->get('type_id'));
                $post=$this->typePost($assignment,$request,$varsity_id,$department_id,$course_id);
                if($post){
                    return response()->json([
                        'message' => 'You have successfully added Assignment',
                    ],200);
                }
            }
            else if($request->get('type')=='assessment'){
                $assessment=Assessment::findOrFail($request->get('type_id'));
                $post=$this->typePost($assessment,$request,$varsity_id,$department_id,$course_id);
                if($post){
                    return response()->json([
                        'message' => 'You have successfully added Assignment',
                    ],200);
                }
            }
            else if($request->get('type')=='note'){
                $note=Note::findOrFail($request->get('type_id'));
                $post=$this->typePost($note,$request,$varsity_id,$department_id,$course_id);
                if($post){
                    return response()->json([
                        'message' => 'You have successfully added Assignment',
                    ],200);
                }
            }
            else{
                return response()->json([
                    'message' => 'There is something wrong',
                ],400);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if($post->showPost()){// this will test if the user viwed the post or not
            return view('post.show',compact('post'));
        }
        $post->increment('views');//I have a separate column for views in the post table. This will increment the views column in the posts table.
        PostView::createViewLog($post);
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('adminpanel.post.editpost',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title'  => $request->get('edit_title'),
            'body'  => $request->get('body'),
            'slug' => $request->get('edit_slug'),
        ]);
        if($post){
            return redirect()->route('admin.index');
        }
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('slug', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%")
            ->get()->paginate(8);
    
        // Return the search view with the resluts compacted
        $varsities=Varsity::inRandomOrder()->take(5)->get()->sortByDesc('created_at');
        return view('post.index',compact('posts','varsities'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
