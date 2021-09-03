<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Note;
use App\Models\Varsity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.notes.addnote');
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
            $note=$course->notes()->create([
                'name' => $request->get('name'),
                'slug' => $request->get('slug')
            ]);
            if($note){
                return response()->json([
                    'message' => 'You have successfully added a note',
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
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        $varsities=Varsity::inRandomOrder()->take(5)->get()->sortByDesc('created_at');
        $next=$note->next();
        $previous=$note->previous();
        return view('post.index',compact('note','varsities','next','previous'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
