<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Web Penyewaan Lapang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="user/assets/img/favicon.png" rel="icon">
    <link href="user/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="user/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="user/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="user/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="user/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="user/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="user/assets/css/main.css" rel="stylesheet">

</head>

<body>

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <nav id="navmenu" class="navmenu d-flex">
                <ul>
                    <li><a href="#">Welcome</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            @auth
                @if (auth()->user()->role == 'admin')
                    <a class="btn btn-primary rounded-pill px-3" href="/homeAdmin">Login / Daftar</a>
                @elseif (auth()->user()->role == 'user')
                    <a class="btn btn-primary rounded-pill px-3" href="/home">Login / Daftar</a>
                @endif
            @else
                <a class="btn btn-primary rounded-pill px-3" href="/login">Login / Daftar</a>
            @endauth
        </div>
    </header>

    <main class="main">

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section border">

            <!-- Section Title -->
            <div class="container section-title background" data-aos="fade-up">
                <h2>Selamat Datang di Web Penyewaan Lapang</h2>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="wallpaper.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="wallpaper-2.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="wallpaper-3.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <p>Website penyewaan lapang olahraga.</p>
                    </div>
                </div>
            </div><!-- End Section Title -->


        </section><!-- /Starter Section Section -->

    </main>

    <footer id="footer" class="footer position-relative light-background">

        <div class="container copyright text-center">
            <p>© <span>Copyright</span><strong class="px-1 sitename">2024</strong><span>All Rights
                    Reserved</span></p>
            {{-- <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div> --}}
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="user/assets/vendor/php-email-form/validate.js"></script>
    <script src="user/assets/vendor/aos/aos.js"></script>
    <script src="user/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="user/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="user/assets/js/main.js"></script>

</body>

</html>
