<!DOCTYPE html>
<html lang="en" data-bs-theme="dark" dir="ltr" class="theme-fs-sm">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="base-url" content="{{ url('') }}">
        {{-- Laravel CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Page Title --}}
        <title>@yield('title', 'Admin Panel')</title>
        {{-- Favicon --}}
        <link rel="shortcut icon"
            href="{{ \App\Models\Setting::get('favicon') ? asset(\App\Models\Setting::get('favicon')) : asset('assets/images/favicon.ico') }}">
        {{-- CSS Files --}}
        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
        <link href="{{ asset('assets/css/icon.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/libs.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/backend.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/customizer.css') }}" rel="stylesheet">
        {{-- Extra Head Section --}}
        @stack('styles')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="">
        <!-- Loader -->
        <div id="loading"></div>
        <!-- Loader End -->
        <!-- Sidebar -->
        @include('layouts.partials.sidebar')
        <!-- /Sidebar -->
        <!-- Main Content -->
        <div class="main-content wrapper">
            <div class="position-relative pr-hide default">
                {{-- Header --}}
                @include('layouts.partials.navbar')
                <!-- /Header -->
            </div>
            {{-- Page Content --}}
            <div class="conatiner-fluid content-inner pb-0" id="page_layout">
                <!-- Main content block -->
                @yield('content')
                <!-- Main content block end -->
            </div>
        </div>
        <!-- Footer block -->
        <footer class="footer pr-hide sticky ">
            <div class="footer-body">
                <div class="text-center">
                    <a href="https://apps.iqonic.design/streamit-laravel/app/dashboard">Streamit</a>
                    <span>(v1.6.2)</span>
                </div>
            </div>
        </footer>
        <div class="modal fade" data-iq-modal="renderer" id="renderModal" tabindex="-1"
            aria-labelledby="renderModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" data-iq-modal="content">
                    <div class="modal-header">
                        <h5 class="modal-title" data-iq-modal="title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" data-iq-modal="body">
                        <p>Modal body text goes here.</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        <script src="{{ asset('assets/js/backend.js') }}"></script>
        <script src="{{ asset('assets/js/utility.js') }}"></script>
        {{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}
        <script src="{{ asset('assets/js/import-export.min.js') }}"></script>
        @stack('scripts')
        <script src="https://instant.page/5.2.0" type="module" defer></script>
    </body>

</html>
