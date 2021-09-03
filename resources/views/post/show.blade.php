@extends('layouts.master')
@section('header')
    @parent
    <title>Note Lagbe - {{ $post->title }}</title>
    <!-- Primary Meta Tags -->
    <meta name="title" content="Note Lagbe - {!! $post->title !!}">
    <meta name="description" content="{{ $post->metadescription }}">
    <meta name="keywords" content="{{ $post->metatag }}">
        <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('post.show', ['post' => $post]) }}">
    <meta property="og:title" content="Note Lagbe - {{ $post->title }}">
    <meta property="og:description" content="{{ $post->metadescription }}"> 
    <meta property="og:image" content="{{ asset('assets/img/custom/thumbnail.png') }}">

        <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ route('post.show', ['post' => $post]) }}">
    <meta property="twitter:title" content="Note Lagbe - {{ $post->title }}">
    <meta property="twitter:description" content="{{ $post->metadescription }}">
    <meta property="twitter:image" content="{{ asset('assets/img/custom/thumbnail.png') }}">
    <meta name="author" content="{{ $post->user->name }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/highlight/styles/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/highlight/styles/school-book.css') }}">
    <style>
    </style>
@endsection

@section('content')
    <div class="col-md-9 mobile-space">
        <div class="card border-primary mb-3">
            <div class="card-body text-dark">
                <h1 class="card-title mb-2">{{ $post->title }}</h1>
                <small class="text-muted">Written by <strong>{{ $post->user->name }}</strong>, published on
                    {{ $post->created_at }}</small>
                {!! $post->body !!}
                <div class="entry-footer clearfix">
                    <div class="mb-2 float-left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bookmarks" viewBox="0 0 16 16">
                            <path
                                d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z" />
                            <path
                                d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z" />
                        </svg>
                        <ul class="cats">
                            <li><a
                                    href="{{ route('course.show', ['course' => $post->postable->course]) }}">{{ $post->postable->course->name }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex border-top border-1 pt-2">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                class="bi bi-bookmark" viewBox="0 0 16 16">
                                <path
                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                            </svg>
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-primary mb-3 d-md-none d-lg-none d-xl-none">
            <div class="p-2 border-bottom border-2">
                <div class="input-group mb-2">
                    <input type="text" class="copyURL form-control" value="{{ route('post.show', ['post' => $post]) }}"
                        id="copyURL" readonly aria-label="URL Copy">
                    <button class="btn btn-primary" id="copyButton" aria-label="URL Copy">
                        <span aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-clipboard" viewBox="0 0 16 16">
                                <path
                                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                <path
                                    d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
            <div class="card-body text-dark d-flex justify-content-between">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('post.show', ['post' => $post]) }}"
                    target="_blank" rel="noreferrer" class="btn facebook text-white" title="Share this post on Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-facebook me-2" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                    Share
                </a>
                <a href="whatsapp://send?text={{ route('post.show', ['post' => $post]) }}" target="_blank"
                    rel="noreferrer" class="btn whatsapp text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-whatsapp me-2" viewBox="0 0 16 16">
                        <path
                            d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                    </svg>
                    Share
                </a>
                <a href="https://twitter.com/intent/tweet?text={{ $post->title }}&amp;url={{ route('post.show', ['post' => $post]) }}"
                    target="_blank" rel="noreferrer" class="btn twitter text-white" title="Share this post on Twitter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-twitter me-2" viewBox="0 0 16 16">
                        <path
                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg>
                    Share
                </a>
            </div>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-body text-dark">
                <div class="contact-form article-comment">
                    <div class="fw-bold fs-5 mb-2">Leave a Reply</div>
                    <form id="contact-form" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="Name" id="username" placeholder="Name *" class="form-control" type="text"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="Email" id="userEmail" placeholder="Email *" class="form-control"
                                        type="email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" placeholder="Your message *" rows="4"
                                        class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="send">
                                    <button class="btn btn-primary"><span>Submit</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('leftsidebar')
    @parent
    <div class="d-flex flex-column p-3 bg-light mb-3 bg-body shadow-lg rounded-3">
        <div class="border-bottom border-2 p-1 mb-2 fw-bold fs-5">Share This Article</div>
        <div class="input-group mb-2">
            <input type="text" class="copyURL form-control" value="{{ route('post.show', ['post' => $post]) }}"
                id="copyText" readonly aria-label="URL Copy">
            <button class="btn btn-outline-primary" id="copyBtn" aria-label="URL Copy">
                <span aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-clipboard" viewBox="0 0 16 16">
                        <path
                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                        <path
                            d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                    </svg>
                </span>
            </button>
        </div>
        <ul class="list-group list-group-flush rounded-3">
            <li class="list-group-item bg-primary border border-light">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('post.show', ['post' => $post]) }}"
                    target="_blank" rel="noreferrer" class="fw-bold text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-facebook me-2" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                    Facebook
                </a>
            </li>
            <li class="list-group-item bg-primary border border-light">
                <a href="whatsapp://send?text={{ route('post.show', ['post' => $post]) }}" target="_blank"
                    rel="noreferrer" class="fw-bold text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-whatsapp me-2" viewBox="0 0 16 16">
                        <path
                            d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                    </svg>
                    Whatsapp
                </a>
            </li>
            <li class="list-group-item bg-primary border border-light">
                <a href="https://t.me/share/url?url={{ route('post.show', ['post' => $post]) }}&text={{ $post->title }}"
                    target="_blank" rel="noreferrer" class="fw-bold text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-telegram me-2" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z" />
                    </svg>
                    Telegram
                </a>
            </li>
            <li class="list-group-item bg-primary border border-light">
                <a href="https://twitter.com/intent/tweet?text={{ $post->title }}&amp;url={{ route('post.show', ['post' => $post]) }}"
                    target="_blank" rel="noreferrer" class="fw-bold text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-twitter me-2" viewBox="0 0 16 16">
                        <path
                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg>
                    Twitter
                </a>
            </li>
        </ul>
    </div>
@endsection

@section('extrajs')
    <script src="{{ asset('assets/js/highlight/highlight.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert/dist/sweetalert2.min.js') }}"></script>
    <script>
        const copyBtn = document.getElementById('copyBtn')
        const copyText = document.getElementById('copyText')

        copyBtn.onclick = () => {
            copyText.select(); // Selects the text inside the input
            document.execCommand('copy'); // Simply copies the selected text to clipboard 
            Swal.fire({
                icon: 'success',
                title: 'Text copied to clipboard',
                showConfirmButton: false,
                timer: 2000
            });
        }
    </script>
    <script>
        const copyButton = document.getElementById('copyButton')
        const copyURL = document.getElementById('copyURL')

        copyButton.onclick = () => {
            copyURL.select(); // Selects the text inside the input
            document.execCommand('copy'); // Simply copies the selected text to clipboard 
            Swal.fire({
                icon: 'success',
                title: 'Text copied to clipboard',
                showConfirmButton: false,
                timer: 1000
            });
        }
    </script>
    <script>
        hljs.highlightAll();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function resize() {
            if ($(window).width() < 700) {
                $('.ratio').removeClass('ratio-16x9').addClass('ratio-1x1');
            }
        }

        //watch window resize
        resize()
    </script>
@endsection
