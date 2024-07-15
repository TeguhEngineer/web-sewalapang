<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Penyewaan Lapangan</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/user/assets/img/favicon.png" rel="icon">
    <link href="/user/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/user/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/user/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/user/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/user/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/user/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="/user/assets/css/main.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="starter-page-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <nav id="navmenu" class="navmenu d-flex">
                <ul>
                    {{-- @if (request()->routeIs('tiket', 'detail')) --}}
                    <li><a href="/home" class="text-decoration-none">Home</a></li>
                    <li><a href="/sewa" class="text-decoration-none">Sewa</a></li>
                    <li><a href="/jadwalsewa" class="text-decoration-none">Jadwal Sewa</a></li>
                    <li><a href="/riwayat" class="text-decoration-none">Riwayat</a></li>
                    <li><a href="/kontak" class="text-decoration-none">Kontak</a></li>
                    @php
                        $upload = \App\Models\Penyewaan::where('user_id', auth()->user()->id)
                            ->latest()
                            ->first();
                    @endphp
                    @if (request()->routeIs('riwayat'))
                        @if ($upload)
                            @if ($upload->status == 'pending' || $upload->status == 'aktif')
                                <button class="btn btn-outline-warning" data-bs-toggle="modal"
                                    data-bs-target="#upload">Upload
                                    Bukti Pembayaran</button>
                            @endif
                        @endif
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn btn-outline-danger rounded-pill px-4" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="bi bi-power"></i> Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>
    </header>

    <!-- Modal Upload -->
    @if ($upload)
        @if ($upload->status == 'pending')
            <div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bukti Pembayaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <h3>Menunggu Konfirmasi Admin</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @elseif ($upload->status == 'aktif' && $upload->bukti_transaksi == !null)
            <div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bukti Pembayaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <h3>Bukti Pembayaran Sudah di Upload</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @elseif ($upload->status == 'aktif')
            <div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bukti Pembayaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="/riwayat/{{ $upload->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <input type="file" name="image" accept="image/*" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endif

    @yield('content')

    <footer id="footer" class="footer position-relative light-background">

        <div class="container copyright text-center mt-4">
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

    {{-- Notifikasi --}}
    <script src="{{ mix('js/app.js') }}"></script>
    @include('layouts.notifikasi')

    <!-- Vendor JS Files -->
    <script src="/user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/user/assets/vendor/php-email-form/validate.js"></script>
    <script src="/user/assets/vendor/aos/aos.js"></script>
    <script src="/user/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/user/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="/user/assets/js/main.js"></script>

</body>

</html>
