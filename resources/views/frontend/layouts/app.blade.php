<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Stikes Hang Tuah Tanjungpinang- BAAK</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{asset('frontend/assets/img/favicon.png')}}" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- tegrity="sha384-BDXgFqzL/EpYeT/J5XTrxR+qDB4ft42notjpwhZDEjDIzutqmXeImvKS3YPH/WJX" crossorigin="anonymous"> --}}

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{asset('assets/frontend/assets/css/main.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.min.css" rel="stylesheet"
        integrity="sha384-BDXgFqzL/EpYeT/J5XTrxR+qDB4ft42notjpwhZDEjDIzutqmXeImvKS3YPH/WJX" crossorigin="anonymous">
    <!-- =======================================================
  * Template Name: BizLand
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Updated: Dec 05 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header sticky-top">

        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a
                            href="https://stikesht-tpi.ac.id/">stikestpi@gmail.com</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>(0771) 4440071</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="{{route('login')}}" class="link-light">Login</a>

                </div>
            </div>
        </div><!-- End Top Bar -->

        @include('frontend.layouts.navbar')

    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center"
                        data-aos="zoom-out">
                        <h1>Selamat Datang <span>Di Biro Administrasi Akademik Kemahasiswaan SHT</span></h1>
                        <p>BAAK Menyediakan Aplikasi Pengajuan Surat Aktif Kuliah Untuk Mahasiswa/i Stikes Hang Tuah
                            Tanjungpinang</p>
                        {{-- <div class="d-flex">
                            <a href="#about" class="btn-get-started">Get Started</a>
                            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        </div> --}}
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        @yield('content')
    </main>

    <footer id="footer" class="footer">

        <div class="footer-newsletter">
        </div>

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{route('frontend.index')}}" class="d-flex align-items-center">
                        <span class="sitename">Biro Administrasi Akademik Kemahasiswaan - SHT</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Jalan WR Supratman Tanjungpinang Timur</p>
                        <p>Tanjungpinang, Kepulauan Riau</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>(0771) 4440071</span></p>
                        <p><strong>Email:</strong> <span>stikestpi@gmail.com</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Link Bantuan</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#hero">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#alur_sistem">Alur Surat</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#form_surat">Pengajuan Surat</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#table_surat">List Surat</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    {{-- <h4>Our Services</h4> --}}

                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links d-flex">
                        {{-- <a href=""><i class="bi bi-twitter-x"></i></a> --}}
                        <a href="https://www.youtube.com/channel/UCdCbAjqdq8KM3NRPPDgcwtQ"><i
                                class="bi bi-youtube"></i></a>
                        <a href="https://www.instagram.com/stikeshttpi/"><i class="bi bi-instagram"></i></a>
                        {{-- <a href=""><i class="bi bi-linkedin"></i></a> --}}
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Stikes Hang Tuah Tanjungpinang</strong> <span>All
                    Rights Reserved</span>
            </p>
            <div class="credits">
                Designed by <a href="https://www.linkedin.com/in/fernandomardinurzaman/">Fernando Mardi Nurzaman</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{asset('assets/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/frontend/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/frontend/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
    <script src="{{asset('assets/frontend/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('assets/frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"
        integrity="sha384-AenwROccLjIcbIsJuEZmrLlBzwrhvO94q+wm9RwETq4Kkqv9npFR2qbpdMhsehX3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.min.js"
        integrity="sha384-G85lmdZCo2WkHaZ8U1ZceHekzKcg37sFrs4St2+u/r2UtfvSDQmQrkMsEx4Cgv/W" crossorigin="anonymous">
    </script>
    <!-- Main JS File -->
    <script src="{{asset('assets/frontend/assets/js/main.js')}}"></script>

    @stack('scriptFrontend')

</body>

</html>