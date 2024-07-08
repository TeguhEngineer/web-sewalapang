@extends('layouts.kerangkaUser')
@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Kontak CS</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/sewa" class="text-decoration-none text-secondary">Index</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <section id="contact" class="contact section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Maps</h3>
                            <p>GOR Perkasa Alam</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-instagram"></i>
                            <h3>Instagram</h3>
                            <p>@nama_instagram</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-facebook"></i>
                            <h3>Facebook</h3>
                            <p>@namafacebook</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-twitter"></i>
                            <h3>Twitter</h3>
                            <p>@nama_twitter</p>
                        </div>
                    </div><!-- End Info Item -->
                    <div class="col-lg-12 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-whatsapp"></i>
                            <h3>WhatsApp</h3>
                            <a href="https://wa.me/+6281363359886?text=Hallo..." class="text-decoration-none">Hubungi Sekarang</a>
                        </div>
                    </div><!-- End Info Item -->

                </div>

            </div>

        </section>

    </main>
@endsection
