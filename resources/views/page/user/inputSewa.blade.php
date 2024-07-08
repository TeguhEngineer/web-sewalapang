@extends('layouts.kerangkaUser')
@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Input Penyewaan Lapang</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/sewa" class="text-decoration-none text-secondary">Index</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Input Sewa</a></li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <section id="features-details" class="features-details section py-3">

            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-lg-7 table-responsive text-center" data-aos="fade" data-aos-delay="500">
                        @if ($cekSewa)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong> <i class="bi bi-exclamation-triangle"></i> Penyewaan Lapangmu Masih Aktif!</strong>
                                <br> Mohon untuk menunggu hingga selesai jika ingin menyewa kembali, Terimakasih. <br>
                                <a href="/riwayat" class="btn btn-outline-secondary btn-sm mt-2">Lihat Riwayat</a>
                            </div>
                        @else
                            @if ($jadwalSewa == null)
                                <h1 class="text-center">Jadwal Belum Tersedia.</h1>
                            @else
                                <form action="/inputSewa" method="post">
                                    @csrf
                                    <table>
                                        <tr>
                                            <td class="fw-bold">Nama</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control" name=""
                                                    value="{{ $userLogin->username }}" disabled>
                                                <input type="hidden" name="user_id" value="{{ $userLogin->id }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold pt-3">Jenis Sewa</td>
                                            <td class="pt-3">:</td>
                                            <td class="pt-3"><input type="text" class="form-control"
                                                    value="{{ $jenisSewa->jenis_sewa }}" disabled></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold pt-3">Jenis Lapangan</td>
                                            <td class="pt-3">:</td>
                                            <td class="pt-3">
                                                <select name="jenislapang_id" id="" class="form-select">
                                                    <option value="" selected hidden>--Pilih Jenis Lapang--</option>
                                                    @foreach ($jenisLapangs as $item)
                                                        <option value="{{ $item->id }}">{{ $item->jenis_lapang }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- Jadwal id --}}
                                            <input type="hidden" name="jadwal_id" value="{{ $jadwalSewa->id }}">

                                            <td class="pt-5  fw-bold">Kegiatan</td>
                                            <td class="pt-5">:</td>
                                            <td class="pt-5"><input type="text" class="form-control" name=""
                                                    value="{{ $jadwalSewa->kegiatan }}" disabled></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold pt-3">Mulai Sewa</td>
                                            <td class="pt-3">:</td>
                                            <td class="pt-3"><input type="text" class="form-control" name=""
                                                    value="{{ \Carbon\Carbon::parse($jadwalSewa->mulai_sewa)->format('d-m-Y') }}" disabled></td>

                                            <td class="ps-5 fw-bold pt-3">Hari</td>
                                            <td class="pt-3">:</td>
                                            <td class="pt-3">
                                                <select name="" id="" class="form-select"
                                                    style="width: 100px;" disabled>
                                                    <option value=""> {{ $jadwalSewa->hari }}
                                                    </option>
                                                </select>
                                            </td>

                                            <td class="ps-5 fw-bold pt-3">Jam</td>
                                            <td class="pt-3">:</td>
                                            <td class="pt-3">
                                                <select name="" id="" class="form-select"
                                                    style="width: 100px;" disabled>
                                                    <option value="">{{ $jadwalSewa->jam }}</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold pt-3">Status</td>
                                            <td class="pt-3">:</td>
                                            <td class="pt-3"><input type="text" class="form-control" name=""
                                                    value="{{ $jadwalSewa->status }}" disabled></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold pt-3">Lama Sewa</td>
                                            <td class="pt-3">:</td>
                                            <td class="pt-3">
                                                <select name="" id="" class="form-select" disabled>
                                                    <option value="">{{ $jadwalSewa->lama_sewa }}</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <input type="hidden" name="status" value="aktif">
                                    <button type="submit" class="btn btn-success float-end px-4 mt-4">Pesan</button>
                                </form>
                            @endif
                        @endif
                    </div>

                    {{-- Mengecek lapang sudah di booking --}}
                    {{-- <button id="myButton" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#errorModal" hidden>klik</button>
                    @if (session('error'))
                        <script>
                            window.onload = function() {
                                var button = document.getElementById('myButton');
                                button.click();
                            };
                        </script>
                    @endif
                    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="errorModalLabel">Pemberitahuan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ session('error') }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div><!-- Features Item -->

            </div>



        </section><!-- /Features Details Section -->

    </main>

@endsection
