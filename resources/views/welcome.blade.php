@extends('layouts.master')
@section('header')
@parent
<title>Note Lagbe</title>
<meta name="description" content="Put your description here.">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
@endsection

@section('content')
<div class="col-lg-6 col-md-12 col-sm-12">
    <div id="section-title" class="section-title p-1 pt-3">
        <h2 class="text-center fw-bold">Recent Posts</h2>
    </div>
    <div class="card bg-light shadow bg-body rounded-3 mb-2">
        <div class="card-body">
            <h2 class="card-title">
                <a href="post-detail.html">Special title treatment</a>
            </h2>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <div class="d-flex text-center border-top border-1 pt-2">
                <small class="pt-2 pb-2 me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                    </svg>
                    47 Reactions
                </small>
                <small class="pt-2 pb-2 me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                    10 Comments
                </small>
                <small class="pt-2 pb-2 me-2 ms-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                    </svg>
                </small>
            </div>
        </div>
    </div>
    <nav class="mt-3" aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
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
        <div class="bg-light shadow bg-body rounded-3 mb-3">
            <div class="card-header bg-primary bg-gradient text-white fw-bold fs-5">
                Top Articles
            </div>
            <ul class="list-group list-group-flush mb-2">
                <li class="list-group-item">
                    Integrasi Ckeditor dengan Laravel File Manager di Laravel 8
                    <div>
                        <small class="text-muted">27 April 2021,</small>
                        <small class="text-muted">5500 views </small>
                    </div>
                </li>
                <li class="list-group-item">
                    Integrasi Ckeditor dengan Laravel File Manager di Laravel 8
                    <div>
                        <small class="text-muted">27 April 2021,</small>
                        <small class="text-muted">5500 views </small>
                    </div>
                </li>
                <li class="list-group-item">
                    Integrasi Ckeditor dengan Laravel File Manager di Laravel 8
                    <div>
                        <small class="text-muted">27 April 2021,</small>
                        <small class="text-muted">5500 views </small>
                    </div>
                </li>
                <li class="list-group-item">
                    Integrasi Ckeditor dengan Laravel File Manager di Laravel 8
                    <div>
                        <small class="text-muted">27 April 2021,</small>
                        <small class="text-muted">5500 views </small>
                    </div>
                </li>
                <li class="list-group-item">
                    Integrasi Ckeditor dengan Laravel File Manager di Laravel 8
                    <div>
                        <small class="text-muted">27 April 2021,</small>
                        <small class="text-muted">5500 views </small>
                    </div>
                </li>
                <li class="list-group-item">
                    Integrasi Ckeditor dengan Laravel File Manager di Laravel 8
                    <div>
                        <small class="text-muted">27 April 2021,</small>
                        <small class="text-muted">5500 views </small>
                    </div>
                </li>
                <li class="list-group-item">
                    Integrasi Ckeditor dengan Laravel File Manager di Laravel 8
                    <div>
                        <small class="text-muted">27 April 2021,</small>
                        <small class="text-muted">5500 views </small>
                    </div>
                </li>
            </ul>
        </div>
        <div class="d-flex flex-column mb-3 bg-light shadow bg-body rounded">
            <div class="card-header bg-primary bg-gradient text-white fw-bold fs-5">
                Categories
            </div>
            <div class="overflow-auto" style="max-height: 42vh">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Hot News
                        <span class="badge bg-primary rounded-pill">3432</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Technology
                        <span class="badge bg-primary rounded-pill">1423</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Lifestyle
                        <span class="badge bg-primary rounded-pill">982</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Health
                        <span class="badge bg-primary rounded-pill">743</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ramadhan
                        <span class="badge bg-primary rounded-pill">232</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Automotive
                        <span class="badge bg-primary rounded-pill">232</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Finance
                        <span class="badge bg-primary rounded-pill">231</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Travel
                        <span class="badge bg-primary rounded-pill">172</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Sport
                        <span class="badge bg-primary rounded-pill">123</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-flex flex-column bg-light bg-body shadow-lg rounded-3 d-md-none d-lg-none d-xl-none">
            <div class="card-header bg-primary bg-gradient text-white fw-bold fs-5">
                Tags
            </div>
            <div class="p-3 overflow-auto" style="max-height: 42vh">
                <div class="nav tag-cloud">
                    <a href="https://laros.id/tags/laravel">Laravel</a>
                    <a href="https://laros.id/tags/bisnis">Bisnis</a>
                    <a href="https://laros.id/tags/blogging">Blogging</a>
                    <a href="https://laros.id/tags/template">Template</a>
                    <a href="https://laros.id/tags/bootstrap">Bootstrap</a>
                    <a href="https://laros.id/tags/security">Security</a>
                    <a href="https://laros.id/tags/nexmo">Nexmo</a>
                    <a href="https://laros.id/tags/seo">SEO</a>
                    <a href="https://laros.id/tags/toko-online">Toko Online</a>
                    <a href="https://laros.id/tags/jivochat">Jivochat</a>
                    <a href="https://laros.id/tags/plugin">Plugin</a>
                    <a href="https://laros.id/tags/tawkto">Tawkto</a>
                    <a href="https://laros.id/tags/tokopedia">Tokopedia</a>
                    <a href="https://laros.id/tags/ruang-guru">Ruang Guru</a>
                    <a href="https://laros.id/tags/stack">Stack</a>
                    <a href="https://laros.id/tags/wfh">WFH</a>
                    <a href="https://laros.id/tags/disqus">Disqus</a>
                    <a href="https://laros.id/tags/katalon">Katalon</a>
                    <a href="https://laros.id/tags/selenium">Selenium</a>
                    <a href="https://laros.id/tags/vonage">Vonage</a>
                    <a href="https://laros.id/tags/twilio">Twilio</a>
                    <a href="https://laros.id/tags/xampp">Xampp</a>
                    <a href="https://laros.id/tags/larablog">Larablog</a>
                    <a href="https://laros.id/tags/tinymce">TinyMCE</a>
                    <a href="https://laros.id/tags/animation">Animation</a>
                    <a href="https://laros.id/tags/restapi">RestAPI</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection