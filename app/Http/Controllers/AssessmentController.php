<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use App\Models\Varsity;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessments=Assessment::all();
        $varsities=Varsity::inRandomOrder()->take(5)->get()->sortByDesc('created_at');
        return view('assessments.index',compact('assessments','varsities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.assesment.addassessment');
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
            'slug'=>'required|unique:assessments',
            'course'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);   
        }
        else{
            $course=Course::where('slug', $request->get('course'))->firstorfail();
            $assessment=$course->assessments()->create([
                'name' => $request->get('name'),
                'slug' => $request->get('slug')
            ]);
            if($assessment){
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
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function show(Assessment $assessment)
    {
        $varsities=Varsity::inRandomOrder()->take(5)->get()->sortByDesc('created_at');
        $next=$assessment->next();
        $previous=$assessment->previous();
        return view('post.index',compact('assessment','varsities','next','previous'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assessment $assessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assessment $assessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assessment $assessment)
    {
        //
    }
}
