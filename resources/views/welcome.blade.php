<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title_page }}</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <!--  <link href="assets/img/favicon.png" rel="icon">-->
    <!--  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">-->

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/vendor/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: FlexStart - v1.12.0
    * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <img src="blob:https://web.whatsapp.com/037aa1af-cfe7-40ef-a960-be2d13478882" alt="">
            <span>{{ $title_header }}</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#">الرئيسية</a></li>

                @if(!Auth::check())
                    <li><a class="getstarted scrollto" href="/login">دخول</a></li>
                @else
                    <li><a class="getstarted scrollto" href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">{{ $title_main }}</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">{{ $text_main }}</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">

                        @if(!Auth::check())
                            <a href="/login"
                               class="btn-get-started getstarted scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>تسجيل الدخول</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}"
                               class="btn-get-started getstarted scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>لوحة التحكم</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @endif


                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset($img_home) }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/vendor/js/main.js') }}"></script>

</body>

</html>
