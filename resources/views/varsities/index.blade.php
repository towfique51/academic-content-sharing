@extends('layouts.master')
@section('header')
    @parent
    <title>NoteLagbe - Varsity</title>
    <meta name="title" content="NoteLagbe - Varsity">
    <meta name="description" content="Notelagbe is a Bangladeshi educational website formed in early 2021. 
    At notelagbe, our goal is to provide world class academic solutions to local students. ">
        <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title" content="NoteLagbe - Varsity">
    <meta property="og:description" content="Notelagbe is a Bangladeshi educational website formed in early 2021. 
    At notelagbe, our goal is to provide world class academic solutions to local students. ">

        <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ URL::current() }}">
    <meta property="twitter:title" content="NoteLagbe - Varsity">
    <meta property="twitter:description" content="Notelagbe is a Bangladeshi educational website formed in early 2021. 
        At notelagbe, our goal is to provide world class academic solutions to local students. ">
    <meta property="twitter:image" content="{{ asset('assets/img/custom/thumbnail.png') }}">
@endsection

@section('content')
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div id="section-title" class="section-title p-1 pt-3">
            <h2 class="text-center fw-bold">Varsities</h2>
        </div>
        @if (is_array($varsities ?? '') || is_object($varsities ?? ''))
            @foreach ($varsities as $varsity)
                <div class="card bg-light shadow bg-body rounded-3 mb-2">
                    <div class="card-body tab">
                        <h2 class="card-title center">
                            <a style="color: #ececec" href="{{ route('varsity.show', ['varsity' => $varsity->slug]) }}">{{ $varsity->name }}</a>
                        </h2>
                    </div>
                </div>
            @endforeach
        @endif
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
            
        </div>
    </div>
@endsection
