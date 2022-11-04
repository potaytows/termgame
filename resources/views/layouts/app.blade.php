<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sarabun:ital,wght@0,100;1,400;1,500&display=swap"
        rel="stylesheet">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "icon" href ="https://media.tenor.com/MDwQ-TidnI0AAAAC/call-of-the-night-nazuna-nanakusa.gif"
            type = "image/gif">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <link rel="stylesheet" href="{{asset('css/styles.css') }}" />
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <style>
        .card {
            margin: 0 auto;
            /* Added */
            /* float: none; */
            /* Added */
            /* margin-bottom: 10px; */
            /* Added */
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="new_navbar_css navbar navbar-expand-md navar-light text-white shadow-sm">
            <div class="container">
                
              

                <a class="navbar-brand link-dark" href="{{ url('/home') }}">
                    <img src="{{asset('website_image/logo_no_Bg.png')}}" alt="TopG_Logo" width="150px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link link-dark" href="{{ route('login') }}">{{ __('ล็อคอิน') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link link-dark" href="{{ route('register') }}">{{ __('สมัคร') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <b>{{ Auth::user()->name }}</b>
                                @if (Auth()->user()->is_admin==0)
                                <b>(จำนวนเงิน={{Auth::user()->balance}} บาท)</b>
                                @endif
                                <img src="{{asset('userpfp/'.Auth()->user()->user_pfp)}}" class="iconprofileimg" alt="user_pfp">
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if(auth()->user()->is_admin== 1)
                                <a class="dropdown-item link-dark" href="/admin/home">
                                    {{ __('หน้าหลักแอดมิน') }}
                                </a>
                                <a class="dropdown-item link-dark" href="/admin/addCode">
                                    {{ __('เพิ่มสินค้า') }}
                                </a>
                                    <a class="dropdown-item link-dark" href="/admin/adminTopup">
                                    {{ __('คำขอการเติมเงิน') }}    
                                    </a>
                                    <a class="dropdown-item link-dark" href="/admin/adminTopupHistory">
                                        {{ __('ประวัติการเติม') }}
                                        </a>
                                    
                                @endif
                                @if(auth()->user()->is_admin== 0)
                                <a class="dropdown-item link-dark" href="/home/profile">
                                    {{ __('หน้าโปรไฟล์ของฉัน') }}
                                </a>
                                <a class="dropdown-item link-dark" href="/home/request">
                                    {{ __('เติมเงิน') }}
                                </a>
                                <a class="dropdown-item link-dark" href="/home/myitem">
                                    {{ __('สินค้าของฉัน') }}
                                </a>
                                @endif
                                <a class="dropdown-item link-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('ล็อคเอาท์') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
    </div>
    <main class="py-4 content">
        @yield('content')
    </main>

    <div id="footer" class="bd-footer py-4 py-md-5 mt-auto bg-dark" style="clear:both; ">
        <div class="new_footer container ">
            <div class="row"">
                <div class="col-sm-12 col-md-6 text-white">
                    <h3 style="text-align: center;">Topup Gaming</h3>
                    <p style="text-align: center;">บริการเติมเกมส์ออนไลน์</p>
                </div>
                <div class="col-sm-6 col-md-3 pb-5 pb-sm-0 text-white">
                    <h3>Support</h3>
                    <ul class="list-unstyled">
                        <li><a href="">About us</a></li>
                        <li><a href="">Terms of use</a></li>
                        <li><a href="">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 text-white">
                    <h3>Contact us</h3>
                    <ul class="list-unstyled">
                        <li><img class="img-fluid" src="{{asset('website_image/icon/footer_fb.png')}}" alt="">  TopGtopup</li>
                        <li><img class="img-fluid" src="{{asset('website_image/icon/footer_ig.png')}}" alt="">  TopGtopup</li>
                        <li><img class="img-fluid" src="{{asset('website_image/icon/footer_phone.png')}}" alt="">  098-765-4321</li>
                    </ul>
                </div>
            </div>
            <br>
            <p class="copyright text-white" style="text-align: center; font-size: 120%; margin-bottom:0;" >TopGtopup.com © 2022</p>
        </div>
    </div>
</body>
<script src="{{asset('js/uploadprofile.js')}}"></script>

</html>