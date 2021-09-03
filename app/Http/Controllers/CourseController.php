<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::all()->sortByDesc("course_code");
        return view('courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.course.addcourse');
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
            'course_code'=>'required',
            'slug'=>'required|unique:courses',
            'course_credit'=>'required|digits_between:0,1',
            'department'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);   
        }
        else{
            $course=Course::create([
                'name' => $request->get('name'),
                'course_code'  => $request->get('course_code'),
                'slug' => $request->get('slug'),
                'course_credit'=>$request->get('course_credit'),
            ]);
            if($course){
                $department=Department::where('slug', $request->get('department'))->firstorfail();
                $course->depts()->sync($department);
                if($request->has('course_prerequisite')) {
                    $course->prerequisite()->sync($request->get('course_prerequisite'));
                }
                return response()->json([
                    'message' => 'You have successfully added a course',
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
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        // dd($course->labs->count());
        return view('courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function lab(Course $course)
    {

        return view('labs.index',compact('course'));
    }


        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function assignment(Course $course)
    {

        return view('assignments.index',compact('course'));
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function assessment(Course $course)
    {

        return view('assessments.index',compact('course'));
    }

    public function note(Course $course)
    {

        return view('notes.index',compact('course'));
    }

    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        if($request->query('term')){
            $queryString=$request->query('term');
            $courses=Course::select('id','course_code')->where('course_code', 'LIKE', "%$queryString%")->get();
            return $courses;
        }
        
    }

    public function all($id){

        $course=Course::find($id);
        $group=[];
        
        if(Course::find($id)->labs()->count()){
            $labs= $course->labs->toArray();
            $group[]= json_encode(array("text"=>"Lab", "children"=>$labs), JSON_PRETTY_PRINT);
        }
        if(Course::find($id)->assignments()->count()){
            $assignments= $course->assignments->toArray();
            $group[]= json_encode(array("text"=>"Assignment", "children"=>$assignments), JSON_PRETTY_PRINT);
        }
        if(Course::find($id)->notes()->count()){
            $notes= $course->notes->toArray();
            $group[]= json_encode(array("text"=>"Note", "children"=>$notes), JSON_PRETTY_PRINT);
        }
        return response()->json([
            'results' => $group,
        ],200);
        
    }

    public function labs($id){
        $labs=Course::find($id)->labs;
        return $labs;
    }
    public function assignments($id){
        $assignments=Course::find($id)->assignments;
        return $assignments;
    }
    public function notes($id){
        $notes=Course::find($id)->notes;
        return $notes;
    }
    public function assessments($id){
        $assessments=Course::find($id)->assessments;
        return $assessments;
    }


}
