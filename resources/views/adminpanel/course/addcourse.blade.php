@section('header')
@parent
<title>Add Course</title>
@endsection
{{-- Extends layout --}}
@extends('layouts.default')
{{-- Content --}}
@section('container')
   <!--begin::Container-->
   <div class="container">
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Add Course</h3>
        </div>
        <!--begin::Form-->
        <form class="form" id="course_add">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Varsity</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <select class="form-control select2" id="varsity" name="param">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Department</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <select class="form-control select2" id="departmentselect" name="param" multiple="multiple">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Course Name</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <input type="text" id="course_name" class="form-control" placeholder="Enter course name" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Course Code</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <input type="text" id="course_code" class="form-control" placeholder="Enter course Code" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Course slug</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <div class="input-group">
                            <div class="input-group-append"><span class="input-group-text">
                               {{ route('course.index') }}/
                            </span></div>
                            <input type="text" id="course_slug" class="form-control" aria-describedby="basic-addon2" placeholder="Enter course slug"/>
                           </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Course Credit</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <input type="number" id="course_credit" value="3" class="form-control" placeholder="Enter course credit" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Course Prerequisites</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <select class="form-control select2" id="courseprerequisites" name="param" multiple="multiple">
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button type="reset" id="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card-->
</div>
<!--end::Container-->

@endsection

@section('extrajs')
@parent
<script src="{{ asset('assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
<script src="{{ asset('assets/js/custom/course/create_course.js') }}"></script>
@endsection
