@extends('layouts.kerangkaUser')
@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Penyewaan Lapang</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/sewa" class="text-decoration-none text-secondary">Index</a></li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section py-3">
            <div class="container" data-aos="fade" data-aos-delay="100">
                <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                    @foreach ($dataLapang as $item)
                        <div class="col">
                            <div class="card h-100">
                                <img src="lapang/{{ $item->gambar }}" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#jadwal{{ $item->id }}">Jadwal</button>
                                    <a href="/inputSewa/{{ $item->id }}" class="btn btn-success px-3" class="btn btn-primary">Input</a>
                                    <h3 class="mt-2">{{ $item->jenis_sewa }}</h3>
                                    <p>{{ $item->keterangan }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section><!-- /Starter Section Section -->

        <!-- Jadwal -->
        @foreach ($dataLapang as $items)
            <div class="modal fade" id="jadwal{{ $items->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Jadwal {{ $items->jenis_sewa }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row ">
                                <div class="col-7 offset-3">
                                    <table>
                                        @if ($items->jadwal->isNotEmpty())
                                            <tbody>
                                                <tr>
                                                    <td><b>Status</b></td>
                                                    <td>:</td>
                                                    <td>{{ $items->jadwal->first()->status }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Kegiatan</b></td>
                                                    <td>:</td>
                                                    <td>{{ $items->jadwal->first()->kegiatan }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Mulai Sewa</b></td>
                                                    <td>:</td>
                                                    <td>{{ \Carbon\Carbon::parse($items->jadwal->first()->mulai_sewa)->format('d-m-Y') }}/{{ $items->jadwal->first()->hari }}/{{ $items->jadwal->first()->jam }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Lama Sewa</b></td>
                                                    <td>:</td>
                                                    <td>{{ $items->jadwal->first()->lama_sewa }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @else
                                            <h4 class="fw-bold">Belum Ada Jadwal</h4>
                                        @endif
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </main>
@endsection
