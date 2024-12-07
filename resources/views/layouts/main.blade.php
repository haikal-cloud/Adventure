<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Yowishome | Explore 360 Real Estate From Anywhere</title>
    <link rel="shortcut icon" href="{{ asset('/') }}img/favicon.png" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500&family=Poppins:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="{{ asset('/') }}css/plugins.css" />
    <link rel="stylesheet" href="{{ asset('/') }}css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    @stack('css')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-bg"></div>
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader"><span></span></div>
        </div>
    </div>
    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg nav-scroll">
        <div class="container">
            <!-- Logo -->
            <div class="logo-wrapper">
                <a class="logo" href="/">
                    <img src="{{ asset('/') }}img/yowishome.png" class="logo-img" alt="" />
                </a>
                <!-- <a class="logo" href="index.html"> <h2>TRAVOL <span>explore the world</span></h2> </a> -->
            </div>
            <!-- Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="ti-menu"></i></span>
            </button>
            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto">
                    {{-- <!-- Home Link -->
    <li class="nav-item dropdown {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Home</a>
    </li> --}}
<!-- Home Link -->
    <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
        <a class="nav-link" href="/">Home</a>
    </li>

    <!-- About Link -->
    <li class="nav-item {{ Request::is('home')|| Request::is('konten') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}#about">About</a>
    </li>

    <!-- Content Link -->
    <li class="nav-item {{ Request::is('konten') ? 'active' : '' }}">
        <a class="nav-link" href="/konten">Content</a>
    </li>

    <!-- Team Link -->
    <li class="nav-item {{ Request::is('home') || Request::is('konten') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}#team">Team</a>
    </li>


    <!-- Contact Link -->
    <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
        <a class="nav-link" href="#contact">Contact</a>
    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer id="contact" class="footer clearfix">
        <div class="container">
            <!-- First footer -->
            <div class="first-footer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="links dark footer-contact-links">
                            <div class="footer-contact-links-wrapper">
                                <div class="footer-contact-link-wrapper">
                                    <div class="image-wrapper footer-contact-link-icon">
                                        <div class="icon-footer"> <i class="flaticon-phone-call"></i> </div>
                                    </div>
                                    <section id="contact">
                                    <div class="footer-contact-link-content">
                                        <h6>Call us</h6>
                                        <p>+6281535330579</p>
                                    </div>
                                </div>
                                <div class="footer-contact-links-divider"></div>
                                <div class="footer-contact-link-wrapper">
                                    <div class="image-wrapper footer-contact-link-icon">
                                        <div class="icon-footer"> <i class="flaticon-message"></i> </div>
                                    </div>
                                    <div class="footer-contact-link-content">
                                        <h6>Write to us</h6>
                                        <p>yowishome360@gmail.com</p>
                                    </div>
                                </div>
                                <div class="footer-contact-links-divider"></div>
                                <div class="footer-contact-link-wrapper">
                                    <div class="image-wrapper footer-contact-link-icon">
                                        <div class="icon-footer"> <i class="flaticon-placeholder"></i> </div>
                                    </div>
                                    <div class="footer-contact-link-content">
                                        <h6>Address</h6>
                                        <p>Kent Street, Bentley Western Australia, 6102. Postal address: GPO Box U1987, Perth Western Australia, 6845.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second footer -->
            <div class="second-footer">
                <div class="row">
                    <!-- about & social icons -->
                    <div class="col-md-4 widget-area">
                        <div class="widget clearfix">
                            <div class="footer-logo"> <img class="img-fluid" src="img/logo-light.png" alt="">
                            </div>
                            <div class="widget-text">
                                <p>Step into the world of real estate with 360-degree virtual tours that let you explore properties, designs, and spaces from every angle, all from the comfort of your own home.
                                </p>
                                <div class="social-icons">
                                    <ul class="list-inline">
                                        <li><a href="https://instagram.com/adventure.vr?igshid=MzRlODBiNWFlZA"><i
                                                    class="ti-instagram"></i></a></li>
                                        <li><a href="https://www.tiktok.com/@adventure.vr_?_t=8gPqVhTK9gY&_r=1"><i
                                                    class="fab fa-tiktok"></i></a></li>
                                        <!-- <li><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#"><i class="ti-youtube"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- quick links -->
                    <div class="col-md-3 offset-md-1 widget-area">
                        <div class="widget clearfix usful-links">
                            <h3 class="widget-title">Quick Links</h3>
                            <ul>
                                <li><a class="nav-link" href="/">Home</a></li>
                                <li><a href="https://vrtour.my.id/#about">About</a></li>
                                <li><a href="https://vrtour.my.id/#team">Team</a></li>
                                <li><a class="nav-link" href="/konten">Content</a></li>
                                {{-- <li><a href="{{ route('konten.ins') }}">Content</a></li> --}}
                                <li><a href="https://vrtour.my.id/#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bottom footer -->
            <div class="bottom-footer-text">
                <div class="row copyright">
                    <div class="col-md-12">
                        <p class="mb-0">©2023 <a href="#">ADVENTURE</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="{{ asset('/') }}js/jquery-3.6.3.min.js"></script>
    <script src="{{ asset('/') }}js/jquery-migrate-3.0.0.min.js"></script>
    <script src="{{ asset('/') }}js/modernizr-2.6.2.min.js"></script>
    <script src="{{ asset('/') }}js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('/') }}js/jquery.isotope.v3.0.2.js"></script>
    <script src="{{ asset('/') }}js/pace.js"></script>
    <script src="{{ asset('/') }}js/popper.min.js"></script>
    <script src="{{ asset('/') }}js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}js/scrollIt.min.js"></script>
    <script src="{{ asset('/') }}js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('/') }}js/owl.carousel.min.js"></script>
    <script src="{{ asset('/') }}js/jquery.stellar.min.js"></script>
    <script src="{{ asset('/') }}js/jquery.magnific-popup.js"></script>
    <script src="{{ asset('/') }}js/YouTubePopUp.js"></script>
    <script src="{{ asset('/') }}js/select2.js"></script>
    <script src="{{ asset('/') }}js/datepicker.js"></script>
    <script src="{{ asset('/') }}js/jquery.counterup.min.js"></script>
    <script src="{{ asset('/') }}js/smooth-scroll.min.js"></script>
    <script src="{{ asset('/') }}js/custom.js"></script>

    @stack('scripts')
</body>

</html>
