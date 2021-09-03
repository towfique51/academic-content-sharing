@extends('layouts.master')
@section('header')
    @parent
        <!-- Primary Meta Tags -->
    <title>Note Lagbe{!! !empty($lab) ? ' - '.$lab->course->course_code." - ".$lab->name: '' !!}{!! !empty($assignment) ? ' - '.$assignment->course->course_code." - ".$assignment->name: '' !!}{!! !empty($note) ? ' - '.$note->course->course_code." - ".$note->name: '' !!}{!! !empty($book) ? ' - '.$book->course->course_code." - ".$book->name: '' !!}{!! !empty($assessment) ? ' - '.$note->assessment->course_code." - ".$assessment->name: '' !!}</title>
    <meta name="title" content="Note Lagbe {!! !empty($lab) ? ' - '.$lab->course->course_code." - ".$lab->name: '' !!}{!! !empty($assignment) ? ' - '.$assignment->course->course_code." - ".$assignment->name: '' !!}{!! !empty($note) ? ' - '.$note->course->course_code." - ".$note->name: '' !!}{!! !empty($book) ? ' - '.$book->course->course_code." - ".$book->name: '' !!}{!! !empty($assessment) ? ' - '.$note->assessment->course_code." - ".$assessment->name: '' !!}">
    <meta name="description" content="Notelagbe is a Bangladeshi educational website formed in early 2021. At notelagbe, our goal is to provide world class academic solutions to local students. ">

        <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title" content="Note Lagbe {!! !empty($lab) ? ' - '.$lab->course->course_code." - ".$lab->name: '' !!}{!! !empty($assignment) ? ' - '.$assignment->course->course_code." - ".$assignment->name: '' !!}{!! !empty($note) ? ' - '.$note->course->course_code." - ".$note->name: '' !!}{!! !empty($book) ? ' - '.$book->course->course_code." - ".$book->name: '' !!}{!! !empty($assessment) ? ' - '.$note->assessment->course_code." - ".$assessment->name: '' !!}">
    <meta property="og:description" content="Notelagbe is a Bangladeshi educational website formed in early 2021. At notelagbe, our goal is to provide world class academic solutions to local students. "> 
    <meta property="og:image" content="{{ asset('assets/img/custom/thumbnail.png') }}">

        <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ URL::current() }}">
    <meta property="twitter:title" content="Note Lagbe {!! !empty($lab) ? ' - '.$lab->course->course_code." - ".$lab->name: '' !!}{!! !empty($assignment) ? ' - '.$assignment->course->course_code." - ".$assignment->name: '' !!}{!! !empty($note) ? ' - '.$note->course->course_code." - ".$note->name: '' !!}{!! !empty($book) ? ' - '.$book->course->course_code." - ".$book->name: '' !!}{!! !empty($assessment) ? ' - '.$note->assessment->course_code." - ".$assessment->name: '' !!}">
    <meta property="twitter:description" content="Notelagbe is a Bangladeshi educational website formed in early 2021. 
        At notelagbe, our goal is to provide world class academic solutions to local students. ">
    <meta property="twitter:image" content="{{ asset('assets/img/custom/thumbnail.png') }}">
    
@endsection

@section('content')
    <div class="col-lg-6 col-md-12 col-sm-12">
        @isset($lab)
            <div id="section-title" class="section-title p-1 pt-3">
                <h2 class="text-center fw-bold">{{ $lab->course->course_code . ' ' . $lab->name }}</h2>
            </div>
            @foreach ($lab->posts()->orderBy('created_at', 'DESC')->paginate(5)
            as $post)
                <div class="card bg-light shadow bg-body rounded-3 mb-2">
                    <div class="card-body">
                        <h2 class="card-title">
                            <a href="{{ route('post.show', ['post' => $post->slug]) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="card-text">{{ $post->metadescription }}</p>
                        <div class="d-flex text-center border-top border-1 pt-2">
                            <small class="pt-2 pb-2 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                                0 Reactions
                            </small>
                            <small class="pt-2 pb-2 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                    class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                                0 Comments
                            </small>
                            <small class="pt-2 pb-2 me-2 ms-auto">
                                <a
                                    href="{{ route('course.show', ['course' => $post->postable->course]) }}">{{ $post->postable->course->course_code }}</a>
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
            <nav class="mt-3" aria-label="Page navigation example">
                {{ $lab->posts()->paginate(5)->links('pagination.default') }}
            </nav>
        @endisset
        @isset($assignment)
            <div id="section-title" class="section-title p-1 pt-3">
                <h2 class="text-center fw-bold">{{ $assignment->course->course_code . ' ' . $assignment->name }}</h2>
            </div>
            @foreach ($assignment->posts()->paginate(5) as $post)
                <div class="card bg-light shadow bg-body rounded-3 mb-2">
                    <div class="card-body">
                        <h2 class="card-title">
                            <a href="{{ route('post.show', ['post' => $post->slug]) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="card-text">{{ $post->metadescription }}</p>
                        <div class="d-flex text-center border-top border-1 pt-2">
                            <small class="pt-2 pb-2 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                                0 Reactions
                            </small>
                            <small class="pt-2 pb-2 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                    class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                                0 Comments
                            </small>
                            <small class="pt-2 pb-2 me-2 ms-auto">
                                <a
                                    href="{{ route('course.show', ['course' => $post->postable->course]) }}">{{ $post->postable->course->course_code }}</a>
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
            <nav class="mt-3" aria-label="Page navigation example">
                {{ $assignment->posts()->paginate(5)->links('pagination.default') }}
            </nav>
        @endisset
        @isset($note)
            <div id="section-title" class="section-title p-1 pt-3">
                <h2 class="text-center fw-bold">{{ $note->name }}</h2>
            </div>
            @foreach ($note->posts()->paginate(5) as $post)
                <div class="card bg-light shadow bg-body rounded-3 mb-2">
                    <div class="card-body">
                        <h2 class="card-title">
                            <a href="post-detail.html">{{ $post->title }}</a>
                        </h2>
                        <p class="card-text">{{ $post->metadescription }}</p>
                        <div class="d-flex text-center border-top border-1 pt-2">
                            <small class="pt-2 pb-2 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                                0 Reactions
                            </small>
                            <small class="pt-2 pb-2 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                    class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                                0 Comments
                            </small>
                            <small class="pt-2 pb-2 me-2 ms-auto">
                                <a
                                    href="{{ route('course.show', ['course' => $post->postable->course]) }}">{{ $post->postable->course->course_code }}</a>
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
            <nav class="mt-3" aria-label="Page navigation example">
                {{ $note->posts()->paginate(5)->links('pagination.default') }}
            </nav>
        @endisset
        @isset($book)
            <div id="section-title" class="section-title p-1 pt-3">
                <h2 class="text-center fw-bold">{{ $book->name }}</h2>
            </div>
            @foreach ($book->posts()->paginate(5) as $post)
                <div class="card bg-light shadow bg-body rounded-3 mb-2">
                    <div class="card-body">
                        <h2 class="card-title">
                            <a href="post-detail.html">{{ $post->title }}</a>
                        </h2>
                        <p class="card-text">{{ $post->metadescription }}</p>
                        <div class="d-flex text-center border-top border-1 pt-2">
                            <small class="pt-2 pb-2 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                                0 Reactions
                            </small>
                            <small class="pt-2 pb-2 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                    class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                                0 Comments
                            </small>
                            <small class="pt-2 pb-2 me-2 ms-auto">
                                <a
                                    href="{{ route('course.show', ['course' => $post->postable->course]) }}">{{ $post->postable->course->course_code }}</a>
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
            <nav class="mt-3" aria-label="Page navigation example">
                {{ $book->posts()->paginate(5)->links('pagination.default') }}
            </nav>
        @endisset

        @isset($assessment)
            <div id="section-title" class="section-title p-1 pt-3">
                <h2 class="text-center fw-bold">{{ $assessment->course->course_code . ' ' . $assessment->name }}</h2>
            </div>
            @foreach ($assessment->posts()->paginate(5) as $post)
                <div class="card bg-light shadow bg-body rounded-3 mb-2">
                    <div class="card-body">
                        <h2 class="card-title">
                            <a href="{{ route('post.show', ['post' => $post->slug]) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="card-text">{{ $post->metadescription }}</p>
                        <div class="d-flex text-center border-top border-1 pt-2">
                            <small class="pt-2 pb-2 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                                0 Reactions
                            </small>
                            <small class="pt-2 pb-2 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                    class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                                0 Comments
                            </small>
                            <small class="pt-2 pb-2 me-2 ms-auto">
                                <a
                                    href="{{ route('course.show', ['course' => $post->postable->course]) }}">{{ $post->postable->course->course_code }}</a>
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
            <nav class="mt-3" aria-label="Page navigation example">
                {{ $assessment->posts()->paginate(5)->links('pagination.default') }}
            </nav>
        @endisset
        @isset($posts)
            <div id="section-title" class="section-title p-1 pt-3">
                <h2 class="text-center fw-bold">All Post</h2>
            </div>
            @foreach ($posts as $post)
                <div class="card bg-light shadow bg-body rounded-3 mb-2">
                    <div class="card-body">
                        <h2 class="card-title">
                            <a href="{{ route('post.show', ['post' => $post->slug]) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="card-text">{{ $post->metadescription }}</p>
                        <div class="d-flex text-center border-top border-1 pt-2">
                            <small class="pt-2 pb-2 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                                0 Reactions
                            </small>
                            <small class="pt-2 pb-2 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                    class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                                0 Comments
                            </small>
                            <small class="pt-2 pb-2 me-2 ms-auto">
                                <a href="{{ route('varsity.show', ['varsity' => $post->varsity]) }}">{{ Str::upper($post->varsity->short_name) }}</a>
                                <a
                                    href="{{ route('course.show', ['course' => $post->postable->course]) }}">{{ $post->postable->course->course_code }}</a>
                                @if (Str::lower(str_replace('App\\Models\\', '', $post->postable_type)) == 'lab')
                                    <a
                                        href="{{ route('lab.show', ['lab' => $post->postable->slug]) }}">{{ Str::upper($post->postable->name) }}</a>
                                @elseif (Str::lower(str_replace("App\\Models\\","",$post->postable_type))=='assignment' )
                                    <a
                                        href="{{ route('assignment.show', ['assignment' => $post->postable->slug]) }}">{{ Str::upper($post->postable->name) }}</a>
                                @elseif (Str::lower(str_replace("App\\Models\\","",$post->postable_type))=='assessment' )
                                    <a
                                        href="{{ route('assessment.show', ['assessment' => $post->postable->slug]) }}">{{ Str::upper($post->postable->name) }}</a>
                                @elseif (Str::lower(str_replace("App\\Models\\","",$post->postable_type))=='note' )
                                    <a
                                        href="{{ route('note.show', ['note' => $post->postable->slug]) }}">{{ Str::upper($post->postable->name) }}</a>
                                @endif
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
            <nav class="mt-3" aria-label="Page navigation example">
                {{ $posts->links('pagination.default') }}
            </nav>
        @endisset

    </div>
@endsection
@section('rightsidebar')
    <div class="col-lg-3 col-md-12 col-sm-12">
        <div class="sticky-top">
            <div class="card rounded-3 shadow-lg mb-3">
                <div class="card-body">
                    <img src="{{ asset('assets/img/ads1.png') }}" height="117" width="279" class="card-img-top"
                        alt="...">
                </div>
            </div>
            @isset($lab)
                <div class="bg-light shadow bg-body rounded-3 mb-3">
                    <div class="card-header bg-primary bg-gradient text-white fw-bold fs-5">
                        Top Lab Posts
                    </div>
                    <ul class="list-group list-group-flush mb-2">
                        @if ($next)
                            @foreach ($next->posts()->take(5)->get()
            as $post)
                                <li class="list-group-item">
                                    <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
                                    <div>
                                        <small class="text-muted">{{ date('d-m-Y', strtotime($post->created_at)) }} ,</small>
                                        <small class="text-muted">{{ $post->views }} Views</small>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                        @if ($previous)
                            @foreach ($previous->posts()->take(2)->get()
            as $post)
                                <li class="list-group-item">
                                    <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
                                    <div>
                                        <small class="text-muted">{{ date('d-m-Y', strtotime($post->created_at)) }} ,</small>
                                        <small class="text-muted">{{ $post->views }} Views</small>
                                    </div>
                                </li>
                            @endforeach
                        @endif


                    </ul>
                </div>
            @endisset
            @isset($assignment)
                <div class="bg-light shadow bg-body rounded-3 mb-3">
                    <div class="card-header bg-primary bg-gradient text-white fw-bold fs-5">
                        Top Assignment Posts
                    </div>
                    <ul class="list-group list-group-flush mb-2">
                        @if ($next)
                            @foreach ($next->posts()->take(5)->get()
            as $post)
                                <li class="list-group-item">
                                    <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
                                    <div>
                                        <small class="text-muted">{{ date('d-m-Y', strtotime($post->created_at)) }} ,</small>
                                        <small class="text-muted">{{ $post->views }} Views</small>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                        @if ($previous)
                            @foreach ($previous->posts()->take(2)->get()
            as $post)
                                <li class="list-group-item">
                                    <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
                                    <div>
                                        <small class="text-muted">{{ date('d-m-Y', strtotime($post->created_at)) }} ,</small>
                                        <small class="text-muted">{{ $post->views }} Views</small>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            @endisset
            @isset($note)
                <div class="bg-light shadow bg-body rounded-3 mb-3">
                    <div class="card-header bg-primary bg-gradient text-white fw-bold fs-5">
                        Top Note Posts
                    </div>
                    <ul class="list-group list-group-flush mb-2">
                        @if ($next)
                            @foreach ($next->posts()->take(5)->get()
            as $post)
                                <li class="list-group-item">
                                    <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
                                    <div>
                                        <small class="text-muted">{{ date('d-m-Y', strtotime($post->created_at)) }} ,</small>
                                        <small class="text-muted">{{ $post->views }} Views</small>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                        @if ($previous)
                            @foreach ($previous->posts()->take(2)->get()
            as $post)
                                <li class="list-group-item">
                                    <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
                                    <div>
                                        <small class="text-muted">{{ date('d-m-Y', strtotime($post->created_at)) }} ,</small>
                                        <small class="text-muted">{{ $post->views }} Views</small>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            @endisset
            @isset($book)
                <div class="bg-light shadow bg-body rounded-3 mb-3">
                    <div class="card-header bg-primary bg-gradient text-white fw-bold fs-5">
                        Top Book Posts
                    </div>
                    <ul class="list-group list-group-flush mb-2">
                        @if ($next)
                            @foreach ($next->posts()->take(5)->get()
            as $post)
                                <li class="list-group-item">
                                    <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
                                    <div>
                                        <small class="text-muted">{{ date('d-m-Y', strtotime($post->created_at)) }} ,</small>
                                        <small class="text-muted">{{ $post->views }} Views</small>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                        @if ($previous)
                            @foreach ($previous->posts()->take(2)->get()
            as $post)
                                <li class="list-group-item">
                                    <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
                                    <div>
                                        <small class="text-muted">{{ date('d-m-Y', strtotime($post->created_at)) }} ,</small>
                                        <small class="text-muted">{{ $post->views }} Views</small>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            @endisset
            @isset($assessment)
                <div class="bg-light shadow bg-body rounded-3 mb-3">
                    <div class="card-header bg-primary bg-gradient text-white fw-bold fs-5">
                        Top Assessment Posts
                    </div>
                    <ul class="list-group list-group-flush mb-2">
                        @if ($next)
                            @foreach ($next->posts()->take(5)->get()
            as $post)
                                <li class="list-group-item">
                                    <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
                                    <div>
                                        <small class="text-muted">{{ date('d-m-Y', strtotime($post->created_at)) }} ,</small>
                                        <small class="text-muted">{{ $post->views }} Views</small>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                        @if ($previous)
                            @foreach ($previous->posts()->take(2)->get()
            as $post)
                                <li class="list-group-item">
                                    <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
                                    <div>
                                        <small class="text-muted">{{ date('d-m-Y', strtotime($post->created_at)) }} ,</small>
                                        <small class="text-muted">{{ $post->views }} Views</small>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            @endisset
            @isset($posts)
                <div class="bg-light shadow bg-body rounded-3 mb-3">
                    <div class="card-header bg-primary bg-gradient text-white fw-bold fs-5">
                        Varsities
                    </div>
                    <ul class="list-group list-group-flush mb-2">

                        @foreach ($varsities as $varsity)
                            <li class="list-group-item">
                                <a
                                    href="{{ route('varsity.show', ['varsity' => $varsity]) }}">{{ Str::upper($varsity->short_name) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endisset
        </div>
    </div>
@endsection
