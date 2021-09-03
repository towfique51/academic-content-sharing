@section('header')
@parent
<title>Add Varsity</title>
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
            <h3 class="card-title">Add Varisty Information</h3>
        </div>
        <!--begin::Form-->
        <form class="form" id="varsity_add">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Varsity Name</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <input type="text" id="varsity_name" class="form-control" placeholder="Enter varsity name" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Varsity Short Name</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <input type="text" id="varsity_short_name" class="form-control" placeholder="Enter varsity short name" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">Varsity slug</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <div class="input-group">
                            <div class="input-group-append"><span class="input-group-text">
                               {{ route('varsity.index') }}
                            </span></div>
                            <input type="text" id="varsity_slug" class="form-control" aria-describedby="basic-addon2"/>
                           </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button type="submit" id="varsity_submit" class="btn btn-primary mr-2">Submit</button>
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
<script src="{{ asset('assets/js/custom/varsity/custom.js') }}"></script>
@endsection
