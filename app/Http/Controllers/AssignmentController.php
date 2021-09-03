<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Varsity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignment=Assignment::all();
        $varsities=Varsity::inRandomOrder()->take(5)->get()->sortByDesc('created_at');
        return view('labs.index',compact('labs','varsities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.assignments.addassignment');
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
            'name'=> 'required',
            'slug'=>'required|unique:assignments',
            'course'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);   
        }
        else{
            $course=Course::where('slug', $request->get('course'))->firstorfail();
            $assignment=$course->assignments()->create([
                'name' => $request->get('name'),
                'slug' => $request->get('slug')
            ]);
            if($assignment){
                return response()->json([
                    'message' => 'You have successfully added Assignment',
                ],200);
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
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        $varsities=Varsity::inRandomOrder()->take(5)->get()->sortByDesc('created_at');
        $next=$assignment->next();
        $previous=$assignment->previous();
        return view('post.index',compact('assignment','varsities','next','previous'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }
}
