<html lang="en" dir="ltr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>@yield('title')</title>
    <meta name="description" content="Register for The Apostolic Church Abuja Metropolis, Nyanya Area, Gwagwalada Area, Suleja Area Annual Easter Youth Convocation, God First themed The Unique Youth">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">


    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    @stack('header-scripts')
</head>

<body>
    <header class="site-header">
        <div class="header-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-10 col-lg-4">
                        <h1 class="site-branding flex">
                            <a href="/">TACYouths</a>
                        </h1>
                    </div>

                    <div class="col-2 col-lg-8">
                        <nav class="site-navigation">
                            <div class="hamburger-menu d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <!-- .hamburger-menu -->

                            <ul>
                                <li><a href="/">HOME</a></li>
                                {{--
                            <li><a href="#">SUNFEST 2018</a></li> --}}
                                <li><a href="/register">REGISTER</a></li>
                                {{-- <li><a href="#">MINISTERS</a></li> --}}
                                {{-- <li><a href="#">BLOG</a></li> --}}
                                {{-- <li><a href="#">TESTIMONIES</a></li> --}}
                                 <li><a href="/seed">SEED FUND</a></li> 
                                {{-- <li><a href="#"><i class="fas fa-microphone"></i></a></li> --}}
                            </ul>
                            <!-- flex -->
                        </nav>
                        <!-- .site-navigation -->
                    </div>
                    <!-- .col-12 -->
                </div>
                <!-- .row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- header-bar -->
    </header>
