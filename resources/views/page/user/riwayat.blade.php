@extends('layouts.kerangkaUser')
@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Riwayat Penyewaan Saya</h1>
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
                                    <th scope="col" class="text-center">Jenis Lapangan</th>
                                    <th scope="col" class="text-center">Kegiatan</th>
                                    <th scope="col" class="text-center">Mulai Sewa</th>
                                    <th scope="col" class="text-center">Lama Sewa</th>
                                    <th scope="col" class="text-center">Bukti Pembayaran</th>
                                    <th scope="col" class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($riwayat as $item)
                                    <tr>
                                        <th class="text-center">{{ $loop->iteration }}</th>
                                        <td class="text-center">{{ $item->jenisLapang->lapang->jenis_sewa }}</td>
                                        <td class="text-center">{{ $item->jenisLapang->jenis_lapang }}</td>
                                        <td class="text-center">{{ $item->jadwal->kegiatan }}</td>
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::parse($item->jadwal->mulai_sewa)->format('d-m-Y') }}/{{ $item->jadwal->hari }}/{{ $item->jadwal->jam }}
                                        </td>
                                        <td class="text-center">{{ $item->jadwal->lama_sewa }}</td>
                                        <td class="text-center">
                                            @if ($item->bukti_transaksi == null)
                                                <form action="/riwayat/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="file" name="image" accept="image/*" required>
                                                    <button class="btn btn-primary btn-sm" type="submit">kirim</button>
                                                </form>
                                            @else
                                                <img src="bukti_transaksi/{{ $item->bukti_transaksi }}" width="100" alt="">
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($item->bukti_transaksi == null)
                                            <span class="badge rounded-pill text-bg-warning">menunggu pembayaran</span>
                                            @elseif ($item->status == 'selesai')
                                                <span class="badge rounded-pill text-bg-secondary">selesai</span>
                                            @elseif ($item->bukti_transaksi == !null)
                                                <span class="badge rounded-pill text-bg-success">aktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <h3>Kamu belum menyewa lapang!</h3>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section><!-- /Starter Section Section -->

    </main>
@endsection
