
@section('header')
@parent
<title>Add Department</title>
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
            <h3 class="card-title">Add Department Information</h3>
        </div>
        <!--begin::Form-->
        <form class="form" id="add_department">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Select Varsity</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <select class="form-control select2" id="varsity_select" name="param">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Department Name</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <input type="text" id="department_name" class="form-control" placeholder="Enter Department name" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Department Short Name</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <input type="text" id="department_short_name" class="form-control" placeholder="Enter Department short name" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Department slug</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <div class="input-group">
                            <div class="input-group-append"><span class="input-group-text">
                               {{ route('department.index') }}
                            </span></div>
                            <input type="text" id="department_slug" class="form-control" aria-describedby="basic-addon2"/>
                           </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button type="reset" id="department_submit" class="btn btn-primary mr-2">Submit</button>
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
<script src="{{ asset('assets/js/custom/department/custom.js') }}"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
@endsection
