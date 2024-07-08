@extends('layouts.kerangkaUser')
@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Jadwal Penyewaan Lapang</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/sewa" class="text-decoration-none text-secondary">Index</a></li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section py-3">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row ">
                    <div class="col-lg-12 table-responsive">
                        <table class="table table-hover table-bordered table-responsive">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Jenis Sewa</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Kegiatan</th>
                                    <th scope="col" class="text-center">Mulai Sewa</th>
                                    <th scope="col" class="text-center">Lama Sewa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataJadwal as $item)
                                <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <td class="text-center">{{ $item->lapang->jenis_sewa }}</td>
                                    <td class="text-center">{{ $item->status }}</td>
                                    <td class="text-center">{{ $item->kegiatan }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($item->mulai_sewa)->format('d-m-Y') }}/{{ $item->hari }}/{{ $item->jam }}</td>
                                    <td class="text-center">{{ $item->lama_sewa }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section><!-- /Starter Section Section -->

    </main>
@endsection
