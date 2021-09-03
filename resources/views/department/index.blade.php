@extends('layouts.master')
@section('header')
    @parent
    <title>NoteLagbe - {!! !empty($varsity) ? $varsity->name.' - ' : '' !!}Departments</title>
    <meta name="title" content="NoteLagbe - {!! !empty($varsity) ? $varsity->name.' - ' : '' !!} Departments">
    <meta name="description" content="Notelagbe is a Bangladeshi educational website formed in early 2021. 
    At notelagbe, our goal is to provide world class academic solutions to local students. ">
        <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title" content="NoteLagbe - {!! !empty($varsity) ? $varsity->name.' - ' : '' !!}Departments">
    <meta property="og:description" content="Notelagbe is a Bangladeshi educational website formed in early 2021. 
    At notelagbe, our goal is to provide world class academic solutions to local students. ">

        <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ URL::current() }}">
    <meta property="twitter:title" content="NoteLagbe - {!! !empty($varsity) ? $varsity->name.' - ' : '' !!}Departments">
    <meta property="twitter:description" content="Notelagbe is a Bangladeshi educational website formed in early 2021. 
        At notelagbe, our goal is to provide world class academic solutions to local students. ">
    <meta property="twitter:image" content="{{ asset('assets/img/custom/thumbnail.png') }}">
@endsection

@section('content')
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div id="section-title" class="section-title p-1 pt-3">
            <h2 class="text-center fw-bold">{!! !empty($varsity) ? Str::upper($varsity->short_name) . ' - ' : '' !!}Department</h2>
        </div>

        @isset($varsity)
            @foreach ($varsity->depts as $dept)
                <div class="card bg-light shadow bg-body rounded-3 mb-2">
                    <div class="card-body tab">
                        <h2 class="card-title center">
                            <a style="color: #ececec"
                                href="{{ route('department.show', ['department' => $dept->slug]) }}">{{ $dept->name }}</a>
                        </h2>
                    </div>
                </div>
            @endforeach
        @endisset
        @isset($depts)
            @foreach ($depts as $dept)
                <div class="card bg-light shadow bg-body rounded-3 mb-2">
                    <div class="card-body tab">
                        <h2 class="card-title center">
                            <a style="color: #ececec" href="{{ route('department.show', ['department' => $dept->slug]) }}">
                                @foreach ($dept->varsity as $varsityofdept)
                                    {{ Str::upper($varsityofdept->short_name) . ' (' . Str::upper($dept->short_name) . ')' }}
                                @endforeach

                            </a>
                        </h2>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
@endsection



@section('rightsidebar')
    <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="sticky-top">
            <div class="card rounded-3 shadow-lg mb-3">
                <div class="card-body">
                    <img src="{{ asset('assets/img/ads1.png') }}" height="117" width="279" class="card-img-top" alt="...">
                </div>
            </div>
            @isset($varsity)
                <div class="bg-light shadow bg-body rounded-3 mb-3">
                    <div class="card-header bg-primary bg-gradient text-white fw-bold fs-5">
                        {{ Str::upper($varsity->short_name) }} Top Post
                    </div>

                    <ul class="list-group list-group-flush mb-2">
                        @foreach ($varsity->posts()->take(5)->get() as $post)
                            <li class="list-group-item">
                                <a href="{{ route('post.show',['post'=>$post]) }}">{{ $post->title }}</a>
                                <div>
                                    
                                    <small class="text-muted">
                                <a href="{{ route('course.show', ['course' => $post->postable->course]) }}">{{ $post->postable->course->course_code }}</a>
                                    @if (Str::lower(str_replace('App\\Models\\', '', $post->postable_type)) == 'lab')
                                        <a href="{{ route('lab.show', ['lab' => $post->postable->slug]) }}">{{ Str::upper($post->postable->name) }}</a>
                                    @elseif (Str::lower(str_replace("App\\Models\\","",$post->postable_type))=='assignment' )
                                    <a href="{{ route('assignment.show', ['assignment' => $post->postable->slug]) }}">{{ Str::upper($post->postable->name) }}</a>
                                    @elseif (Str::lower(str_replace("App\\Models\\","",$post->postable_type))=='assessment' )
                                    <a href="{{ route('assessment.show', ['assessment' => $post->postable->slug]) }}">{{ Str::upper($post->postable->name) }}</a>
                                    @elseif (Str::lower(str_replace("App\\Models\\","",$post->postable_type))=='note' )
                                    <a href="{{ route('note.show', ['note' => $post->postable->slug]) }}">{{ Str::upper($post->postable->name) }}</a>
                                    @endif
                                </small>
                                <small class="text-muted">{{ date('d-m-Y', strtotime($post->created_at)) }} </small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endisset
        </div>
    </div>
@endsection
