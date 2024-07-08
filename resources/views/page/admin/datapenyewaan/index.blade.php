@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center border py-4">
            <div class="col-lg-10 text-center">
                <h3 class="fw-bold mb-4">DATA PENYEWAAN</h3>
            </div>
            <div class="col-lg-10">
                <label for="" class="me-1">Dari tanggal</label>
                <label for="" class="ms-5">Sampai tanggal</label>
            </div>
            <div class="col-lg-8 mb-4">
                <form action="/dataPenyewaan" method="GET">
                    <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" required>
                    <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" required>
                    <button type="submit" class="btn btn-primary btn-sm px-2">Tampilkan</button>
                </form>
            </div>
            <div class="col-lg-2 text-end">
                <form action="/print" method="GET" target="_blank">
                    <input type="hidden" name="start_date" value="{{ request('start_date') }}">
                    <input type="hidden" name="end_date" value="{{ request('end_date') }}">
                    <button class="btn btn-danger" type="submit"><i class="bi bi-printer"></i> Cetak</button>
                </form>
            </div>
            <div class="col-lg-10 table-responsive">
                @if (isset($dataPenyewaan) && count($dataPenyewaan) > 0)
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Nama</th>
                                <th scope="col" class="text-center">Jenis Sewa</th>
                                <th scope="col" class="text-center">Jenis Lapangan</th>
                                <th scope="col" class="text-center">Kegiatan</th>
                                <th scope="col" class="text-center">Mulai Sewa</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Lama Sewa</th>
                                <th scope="col" class="text-center">Bukti Pembayaran</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPenyewaan as $item)
                                <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <td class="text-center">{{ $item->user->username }}</td>
                                    <td class="text-center">{{ $item->jenisLapang->lapang->jenis_sewa }}</td>
                                    <td class="text-center">{{ $item->jenisLapang->jenis_lapang }}</td>
                                    <td class="text-center">{{ $item->jadwal->kegiatan }}</td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($item->jadwal->mulai_sewa)->format('d-m-Y') }}/{{ $item->jadwal->hari }}/{{ $item->jadwal->jam }}
                                    </td>
                                    <td class="text-center">{{ $item->jadwal->status }}</td>
                                    <td class="text-center">{{ $item->jadwal->lama_sewa }}</td>
                                    <td class="text-center">
                                        @if ($item->bukti_transaksi == null)
                                            <b class="text-danger"><i>*Belum mengirim bukti pembayaran</i></b>
                                        @else
                                            <img src="bukti_transaksi/{{ $item->bukti_transaksi }}" width="100"
                                                alt="">
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($item->status == 'aktif')
                                            <span class="badge rounded-pill text-bg-success">aktif</span>
                                        @elseif ($item->status == 'selesai')
                                            <span class="badge rounded-pill text-bg-secondary">selesai</span>
                                        @endif
                                    </td>
                                    <td class="text-center d-flex justify-content-center">
                                        @if ($item->status == 'aktif')
                                            <button class="btn btn-outline-warning" class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#editStatus{{ $item->id }}"><i
                                                    class="bi bi-pencil-square"></i></button>
                                        @endif
                                        <button class="btn btn-outline-danger ms-2" class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#delete{{ $item->id }}"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-center py-4 fw-bold">Tidak ada data penyewaan</h3>
                @endif
            </div>
        </div>
    </div>

    {{-- Modal Edit Status --}}
    @include('page.admin.datapenyewaan.editStatus')
    @include('page.admin.datapenyewaan.delete')
@endsection
