@section('header')
@parent
<title>Add Note</title>
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
            <h3 class="card-title">Add Note</h3>
        </div>
        <!--begin::Form-->
        <form class="form" id="note_add">
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
                        <select class="form-control select2" id="department" name="param">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Course</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <select class="form-control select2" id="course" name="param">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Note Name</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <input type="text" id="note_name" class="form-control" placeholder="Enter note name" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Note slug</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <input type="text" id="note_slug" class="form-control" placeholder="Enter note slug" />
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
<script src="{{ asset('assets/js/custom/note/custom.js') }}"></script>
@endsection
