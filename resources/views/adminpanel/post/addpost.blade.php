{{-- Extends layout --}}
@extends('layouts.default')
{{-- Content --}}
@section('container')
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Add Post</h3>
            </div>
            <!--begin::Form-->
            <form class="form" id="post_add">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label>Varsity:</label>
                            <select class="form-control select2" id="varsity" name="param">
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>department:</label>
                            <select class="form-control select2" id="department" name="param">
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Course:</label>
                            <select class="form-control select2" id="course" name="param">
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>Type:</label>
                            <select class="form-control select2" id="type" name="param">
                                <option label="Label"></option>
                                <option value="lab">Lab</option>
                                <option value="assignment">Assignment</option>
                                <option value="note">Notes</option>
                                <option value="assessment">Assessment</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Select:</label>
                            <select class="form-control select2" id="type_id" name="param">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Blog Post Title</label>
                        <input type="text" id="title" name="title" class="form-control form-control-lg" placeholder="Title" />
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-left col-lg-3 col-sm-12">{{ route('post.index') }}</label>
                        <div class="col-lg-8 col-md-9 col-sm-12">
                            <input type="text" class="form-control money" id="slug" name="slug">
                        </div>
                    </div>
                    <div class="form-group">
                    <textarea name="editor1" id="editor1">
                    </textarea>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row">
                        <label class="col-form-label text-left col-lg-1 col-sm-12">Tags</label>
                        <div class="col-lg-4 col-md-9 col-sm-8">
                            <input id="metatags" class="form-control" name='tags' placeholder='Type Keywords' value='' />
                        </div>
                        <label class="col-form-label text-left col-lg-2 col-sm-12">Meta Description</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <textarea class="form-control" id="metadescription" maxlength="155"  placeholder="" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>
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
    <!--begin::Page Vendors(used by this page)-->
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
    
    <!--end::Page Vendors-->
    <!--end::Page Vendors-->


    <script src="{{ asset('assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
    <script src="{{ asset('assets/js/custom/post/custom.js') }}"></script>
@endsection
