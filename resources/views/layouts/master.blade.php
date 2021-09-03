<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('header')
    @show
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/avicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-X3FGGD5D91"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-X3FGGD5D91');
</script>
</head>

<body>
    <header class="bg-body border-bottom border-primary fixed-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 d-none d-lg-block">
                    <a href="{{ url('/') }}" class="d-flex  col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none"
                        data-label="Site logo">
                        <img src="{{ asset('assets/img/logo_banner.png') }}" height="40px" width="180px" alt="NoteLagbe">
                    </a>
                </div>
                <div class="col-md-6 d-none d-lg-block">
                    <div class="d-flex align-items-center">
                        <form class="w-100 me-3" action="{{ route('search') }}" method="GET" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="type something to start the search"
                                    aria-label="type something to start the search" aria-describedby="searchButton" name="search">
                                <button class="btn btn-primary" type="submit" id="searchButton"
                                    aria-label="searchButton">
                                    <span aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                            </path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @guest
                    <div class="col-md-3 d-none d-lg-block text-end">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="btn btn-light me-2">Login</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Create account</a>
                        @endif
                    </div>
                @else
                    <div class="col-md-3 d-none d-lg-block text-end">
                        <img class="rounded-circle z-depth-2" height="40px" alt="100x100"
                            src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg" data-holder-rendered="true">
                        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                @endguest
            </div>
        </div>

        <!-- navbar on mobile -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light d-lg-none d-xl-none">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo_banner.png') }}" alt="Notelagbe" height="40px" width="140px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact us</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Disclaimer</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">{{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Create Account</a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                    </ul>
                    <form class="w-100 me-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="type something to start the search"
                                aria-label="type something to start the search" aria-describedby="searchBtn">
                            <button class="btn btn-primary" type="submit" id="searchBtn" aria-label="searchBtn">
                                <span aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main class="mb-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 d-none d-lg-block">
                    <div class="sticky-top">
                        <div class="card mb-3 rounded-3">
                            <div class="card-body">
                                <a href="{{ url('/') }}" target="_blank" rel="noreferrer"><img
                                        src="{{ asset('assets/img/ads.png') }}"
                                        alt="Bisabos - Media Pemrograman Indonesia" height="300" width="279"
                                        class="card-img-top"></a>
                            </div>
                        </div>
                        <div class="d-flex flex-column p-3 bg-light mb-3 shadow">
                            <ul class="nav nav-pills flex-column mb-auto">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-house me-2" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z">
                                            </path>
                                        </svg>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link link-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-file-person me-2" viewBox="0 0 16 16">
                                            <path
                                                d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z">
                                            </path>
                                            <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                        </svg>
                                        About us
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link link-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person-lines-fill me-2"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z">
                                            </path>
                                        </svg>
                                        Contact us
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link link-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-shield-check me-2" viewBox="0 0 16 16">
                                            <path
                                                d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z">
                                            </path>
                                            <path
                                                d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z">
                                            </path>
                                        </svg>
                                        Privacy Policy
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Left Sidebar -->
                        @section('leftsidebar')
                        @show

                        <div class="d-flex flex-column bg-light bg-body shadow-lg rounded-3">
                            <div class="card-header bg-primary bg-gradient text-white fw-bold fs-5">
                                Courses
                            </div>
                            <div class="p-3 overflow-auto" style="max-height: 42vh">
                                <div class="nav tag-cloud">
                                    <a href="https://laros.id/tags/laravel">courses</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @yield('content')
                @yield('rightsidebar')
            </div>
        </div>
    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="border-1 border-top border-primary">
        <div class="container-fluid py-4">
            <div class="copyright">
                © Copyright <strong><span>Note Lagbe</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://www.notelagbe.com/">Notelagbe</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    @yield('extrajs')
</body>

</html>
