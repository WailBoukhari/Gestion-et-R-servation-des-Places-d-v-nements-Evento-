<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="robots" content="noindex, follow" />
        <meta name="description" content="">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    </head>

    <body class="font-sans antialiased">

        <!-- Header Start -->
        <div class="meeta-header-section meeta-header-2 meeta-header-3 meeta-header-5">

            <!-- Header Middle Start -->
            <div class="header-middle header-sticky py-3">
                <div class="container">

                    <div class="header-wrap">
                        <!-- Header Logo Start -->
                        <div class="header-logo header-logo-3">
                            <a class="logo-black" href="{{ route('home') }}"><img style="width: 69%;" src="{{ asset('images/black.png') }}"
                                    alt="Logo"></a>
                            <a class="logo-white" href="{{ route('home') }}"><img style="width: 69%;" src="{{ asset('images/white.png') }}"
                                    alt="Logo"></a>

                        </div>
                        <!-- Header Logo End -->

                        <!-- Header Meta Start -->
                        <div class="header-meta">

                            <div class="header-btn d-none d-md-block">
                                @if (Route::has('login'))
                                    <div class="header-btn d-none d-md-block">
                                        @auth
                                            @role('admin')
                                                <a href="{{ route('admin.dashboard') }}" class="btn-2">Dashboard</a>
                                            @endrole
                                            @role('organizer')
                                                <a href="{{ route('organizer.dashboard') }}" class="btn-2">Dashboard</a>
                                            @endrole
                                            @role('user')
                                                <a href="{{ route('user.dashboard') }}" class="btn-2">Dashboard</a>
                                            @endrole
                                        @else
                                            <a href="{{ route('login') }}" class="btn-2">Log
                                                in</a>
                                            <a href="{{ route('register') }}" class="btn-2">Register</a>
                                        @endauth
                                    </div>
                                @endif
                            </div>

                            <!-- Header Toggle Start -->
                            <div class="header-toggle d-lg-none">
                                <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                            <!-- Header Toggle End -->

                        </div>
                        <!-- Header Meta End -->

                    </div>

                </div>
            </div>
            <!-- Header Middle End -->

        </div>
        <!-- Header End -->
        <main class="main-wrapper">
            {{ $slot }}
        </main>
        <!-- Footer Start -->
        <div class="meeta-footer-5" style="background-image: url({{ asset('images/bg/footer-5-bg.jpg') }});">

            <!-- Footer Widget Start -->
            <div class="footer-widget text-center">
                <div class="container">

                    <!-- Footer Logo Start -->
                    <div class="footer-logo">
                        <a href="index.html"><img src="{{ asset('images/white.png') }}" alt="Logo"></a>
                    </div>
                    <!-- Footer Logo End -->

                    <!-- Footer widget Social Start -->
                    <div class="footer-widget-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                    <!-- Footer widget Social End -->

                    <!-- Footer Copyright Start -->
                    <div class="footer-copyright">
                        <p>2024 Copyright Meeta Designed by Me (i think). All Rights Reserved</p>
                    </div>
                    <!-- Footer Copyright End -->

                </div>
            </div>
            <!-- Footer Widget End -->

        </div>
        <!-- Footer End -->
    </body>

</html>
