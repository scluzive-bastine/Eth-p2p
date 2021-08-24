<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ETH P2P</title>
        <link rel="stylesheet" href="{{asset('/css/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/fonts/icons.css')}}">
        <link rel="stylesheet" href="{{asset('/fonts/plugin.css')}}">

        <link rel="stylesheet" href="{{asset('/fonts/font-awesome/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('/css/skins.css')}}">
        <link rel="stylesheet" href="{{asset('/css/dark-style.css')}}">
        <link rel="stylesheet" href="{{asset('/css/colors/default.css')}}">

        <link rel="stylesheet" href="{{asset('/css/colors/color.css')}}">
        <link rel="stylesheet" href="{{asset('/css/sidemenu.css')}}">
        <link rel="stylesheet" href="{{asset('/css/owl-carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('/css/icon-list.css')}}">
        <link rel="stylesheet" href="{{asset('/css/select2.min.css')}}">


          <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    </head>
    <body class="horizontalmenu dark-theme">
        <div class="page">
            <!-- Main Header-->
            <div class="main-header side-header">
                <div class="container">
                    <div class="main-header-left">
                        {{-- <a class="main-header-menu-icon d-lg-none" href="" id="mainNavShow"><span></span></a> --}}
                        <a class="main-logo" href="{{route('index')}}">
                            <img src="{{asset('/img/p2p-logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{asset('/img/p2p-logo.png')}}" class="header-brand-img desktop-logo theme-logo" alt="logo">
                        </a>
                    </div>
                    <div class="main-header-center">
                        <div class="responsive-logo">
                            <a href="{{route('index')}}"><img src="{{asset('/img/p2p-logo.png')}}" class="mobile-logo" alt="logo"></a>
                            <a href="{{route('index')}}"><img src="{{asset('/img/p2p-logo.png')}}" class="mobile-logo-dark" alt="logo"></a>
                        </div>
                    </div>
                    <div class="main-header-right">
                        <ul class="nav desktop-nav">
                            <li class="nav-item">
                                <a href="" class="nav-link">Features</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">How to trade</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">FAQ</a>
                            </li>
                        </ul>
                        <a href="{{route('connect.wallet')}}" class="btn btn-primary">Connect Wallet</a>

                        {{-- if authenicated --}}
                        {{-- <a href="{{route('user.profile')}}" class="nav-link font-weight-bolder">
                            <i class="fe fe-user"></i>
                            Jane
                        </a> --}}
                        {{-- if authenicated --}}

                        <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                            aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                        </button><!-- Navresponsive closed -->
                    </div>
                </div>
            </div>
            <!-- End Main Header-->

            <!-- Mobile-header -->
            <div class="mobile-main-header">
                <div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <ul class="nav d-block text-right">
                            <li class="nav-item">
                                <a href="" class="nav-link">Features</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">How to trade</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">FAQ</a>
                            </li>
                        </ul>
                        {{-- <div class="dropdown  header-settings d-flex">
                            <a href="#" class="nav-link icon ml-auto" data-toggle="sidebar-right" data-target=".sidebar-right">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-right header-icons"><line x1="21" y1="10" x2="7" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="7" y2="18"></line></svg>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- Mobile-header closed -->

            {{-- Main content --}}
            <div class="main-content pt-0">
                {{-- <div class="container-fluid"> --}}
                    @yield('content')
                {{-- </div> --}}
            </div>
            {{-- Main content --}}

            {{-- footer --}}
            <div class="main-footer mt-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 col-md-4">
                            <img src="{{asset('/img/p2p-logo.png')}}" class="img-fluid" alt="logo">
                            <p class="mt-3">
                                © 2021 VendCryptos Ltd
                            </p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4">
                            <h5>Links</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="" class="nav-link pl-0">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link pl-0">Reviews</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link pl-0">Features</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4">
                            <h5>Community</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="" class="nav-link pl-0">
                                        <i class="fab fa-telegram" aria-hidden="true"></i>
                                        Telegram
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link pl-0">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                        Twitter
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

        <script src="{{asset('/js/jquery.min.js')}}"></script>
        <script src="{{asset('/js/popper.min.js')}}"></script>
        <script src="{{asset('/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/js/owl.carousel.js')}}"></script>
        {{-- for dashboard --}}
        <script src="{{asset('/js/select2.min.js')}}"></script>
        <script src="{{asset('/js/sidebar.js')}}"></script>
        <script src="{{asset('/js/crypto-dashboard.js')}}"></script>
        <script src="{{asset('/js/clipboard/clipboard.min.js')}}"></script>
        <script src="{{asset('/js/clipboard/clipboard.js')}}"></script>
        <script src="{{asset('/js/crypto-dashboard.js')}}"></script>

        {{-- <script src="{{asset('/js/sticky.js')}}"></script> --}}
        {{-- for dashboard --}}
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

        @stack('scripts')
        <script>
            $(document).ready(function() {
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            })
        </script>
    </body>
</html>
