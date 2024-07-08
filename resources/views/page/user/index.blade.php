@extends('layouts.kerangkaUser')
@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Home</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/home" class="text-decoration-none text-secondary">Index</a></li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <section id="features-details" class="features-details section py-3">

            <div class="container">
                <div class="row justify-content-center ">
                    @if (session()->has('welcome'))
                        <div class="col-lg-12" data-aos="fade" data-aos-delay="500">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Hallo {{ $userLogin->username }}!</strong> Selamat datang di website Sewa Lapang.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                        <img src="wallpaper.jpg" class="img-fluid" alt="" style="width: 100%;">
                    </div>

                </div><!-- Features Item -->

            </div>

        </section><!-- /Features Details Section -->

    </main>
@endsection
