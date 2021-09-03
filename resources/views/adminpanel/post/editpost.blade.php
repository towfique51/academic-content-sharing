{{-- Extends layout --}}
@extends('layouts.default')
{{-- Content --}}
@section('container')
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Edit Post</h3>
            </div>
            <!--begin::Form-->
            <form class="form" id="post_edit" method="POST" action="{{ route('panelpost.edit',['post'=>$post->slug]) }}">
                @method('patch')
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Blog Post Title</label>
                        <input type="text" id="edit_title" name="edit_title" class="form-control form-control-lg" placeholder="Title" value="{{ $post->title }}" />
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-left col-lg-3 col-sm-12">{{ route('post.index') }}</label>
                        <div class="col-lg-8 col-md-9 col-sm-12">
                            <input type="text" class="form-control money" id="edit_slug" name="edit_slug" value="{{ $post->slug }}">
                        </div>
                    </div>
                    <div class="form-group">
                    <textarea name="body" id="editor1">
                    {!! $post->body !!}
                    </textarea>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
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
