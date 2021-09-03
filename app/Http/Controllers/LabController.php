<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lab;
use App\Models\Varsity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs=Lab::all();
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
        return view('adminpanel.lab.addlab');
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
            'slug'=>'required|unique:labs',
            'course'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);   
        }
        else{
            $course=Course::where('slug', $request->get('course'))->firstorfail();
            $lab=$course->labs()->create([
                'name' => $request->get('name'),
                'slug' => $request->get('slug'),
                'lab_credit'=>$request->get('lab_credit'),
            ]);
            if($lab){
                return response()->json([
                    'message' => 'You have successfully added '.$lab->name,
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
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function show(Lab $lab)
    {
       $varsities=Varsity::inRandomOrder()->take(5)->get()->sortByDesc('created_at');
       $next=$lab->next();
       $previous=$lab->previous();
       return view('post.index',compact('lab','varsities','next','previous'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function edit(Lab $lab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lab $lab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lab $lab)
    {
        //
    }
}
