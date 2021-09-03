<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depts=Department::all();
        return view('department.index',compact('depts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.department.adddepartment');
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
            'short_name'=>'required',
            'slug'=>'required|unique:departments',
            'varsity'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);   
        }
        else{
            $department=Department::create([
                'name' => $request->get('name'),
                'short_name'  => $request->get('short_name'),
                'slug' => $request->get('slug')
            ]);
            if($department){
                $department->varsity()->sync($request->get('varsity'));
                return response()->json([
                    'message' => 'You have successfully added Department',
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
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('courses.index',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
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
            $depts=Department::select('id','short_name')->where('short_name', 'LIKE', "%$queryString%")->get();
            return $depts;
        }
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Varsity  $varsity
     * @return \Illuminate\Http\Response
     */
    public function departmentCourses(Request $request,$id){
        if($request->query('term')){
            $queryString=$request->query('term');
            $courses = Department::find($id)->courses()->where('course_code', 'LIKE', "%$queryString%")->get();
            return response()->json(
                $courses
            , 200);
        }

    }
}
