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
                                    <strong> <i class="bi bi-exclamation-triangle"></i> Penyewaan Lapangmu Masih
                                        Proses!</strong>
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
                                                        <option value="{{ $item->id }}">{{ $item->jenis_lapang }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- Jadwal id --}}
                                            <input type="hidden" name="jadwal_id" value="{{ $jadwalSewa->id }}">

                                            <td class="pt-5  fw-bold">Kegiatan</td>
                                            <td class="pt-5">:</td>
                                            <td class="pt-5"><input type="text" class="form-control" name="kegiatan"
                                                    required></td>
                                            {{-- <td class="pt-5"><input type="text" class="form-control" name=""
                                                    value="{{ $jadwalSewa->kegiatan }}"></td> --}}
                                        </tr>
                                        <tr>
                                            <td class="fw-bold pt-3">Mulai Sewa</td>
                                            <td class="pt-3">:</td>
                                            <td class="pt-3"><input type="date" class="form-control" name="mulai_sewa"
                                                    required></td>
                                            {{-- <td class="pt-3"><input type="text" class="form-control" name=""
                                                    value="{{ \Carbon\Carbon::parse($jadwalSewa->mulai_sewa)->format('d-m-Y') }}"></td> --}}

                                            <td class="ps-5 fw-bold pt-3">Hari</td>
                                            <td class="pt-3">:</td>
                                            <td class="pt-3">
                                                <select name="hari" id="" class="form-select"
                                                    style="width: 100px;">
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jumat">Jumat</option>
                                                    <option value="Sabtu">Sabtu</option>
                                                    <option value="Minggu">Minggu</option>
                                                </select>
                                                {{-- <select name="" id="" class="form-select"
                                                    style="width: 100px;">
                                                    <option value=""> {{ $jadwalSewa->hari }}
                                                    </option>
                                                </select> --}}
                                            </td>

                                            <td class="ps-5 fw-bold pt-3">Jam</td>
                                            <td class="pt-3">:</td>
                                            <td class="pt-3">
                                                <select name="jam" id="" class="form-select"
                                                    style="width: 100px;">
                                                    <option value="07.00">07.00</option>
                                                    <option value="08.00">08.00</option>
                                                    <option value="09.00">09.00</option>
                                                    <option value="10.00">10.00</option>
                                                    <option value="11.00">11.00</option>
                                                    <option value="12.00">12.00</option>
                                                    <option value="13.00">13.00</option>
                                                    <option value="14.00">14.00</option>
                                                    <option value="15.00">15.00</option>
                                                    <option value="16.00">16.00</option>
                                                    <option value="17.00">17.00</option>
                                                    <option value="18.00">18.00</option>
                                                </select>
                                                {{-- <select name="" id="" class="form-select"
                                                    style="width: 100px;">
                                                    <option value="">{{ $jadwalSewa->jam }}</option>
                                                </select> --}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold pt-3">Status</td>
                                            <td class="pt-3">:</td>
                                            <td class="pt-3"><input type="text" class="form-control"
                                                    name="statusewa" required></td>
                                            {{-- <td class="pt-3"><input type="text" class="form-control" name=""
                                                    value="{{ $jadwalSewa->status }}"></td> --}}
                                        </tr>
                                        <tr>
                                            <td class="fw-bold pt-3">Lama Sewa</td>
                                            <td class="pt-3">:</td>
                                            <td class="pt-3">
                                                <select name="lama_sewa" id="" class="form-select">
                                                    <option value="1 Hari">1 Hari</option>
                                                    <option value="2 Hari">2 Hari</option>
                                                    <option value="3 Hari">3 Hari</option>
                                                    <option value="4 Hari">4 Hari</option>
                                                    <option value="5 Hari">5 Hari</option>
                                                    <option value="6 Hari">6 Hari</option>
                                                    <option value="1 Minggu">1 Minggu</option>
                                                    <option value="2 Minggu">2 Minggu</option>
                                                    <option value="3 Minggu">3 Minggu</option>
                                                    <option value="1 Bulan">1 Bulan</option>
                                                </select>
                                                {{-- <select name="" id="" class="form-select">
                                                    <option value="">{{ $jadwalSewa->lama_sewa }}</option>
                                                </select> --}}
                                            </td>
                                        </tr>
                                    </table>
                                    <input type="hidden" name="status" value="pending">
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
