@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/inputJadwal" method="post">
            @csrf
            <div class="row justify-content-center border py-4">
                <div class="col-lg-10 text-center">
                    <h3 class="fw-bold mb-4">INPUT JADWAL</h3>
                </div>
                <div class="col-lg-10 mb-3">
                    <table>
                        <tr>
                            <td style="width: 70px;">Jenis Sewa</td>
                            <td style="width: 50px" class="text-center">:</td>
                            <td>
                                <select name="jenissewa_id" id="" class="form-select">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    @foreach ($dataLapang as $item)
                                        <option value="{{ $item->id }}">{{ $item->jenis_sewa }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-10 my-3">
                    <table>
                        <tr>
                            <td style="width: 70px;">Status</td>
                            <td style="width: 50px" class="text-center">:</td>
                            <td><input type="text" name="status" class="form-control" required></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-10 my-3">
                    <table>
                        <tr>
                            <td style="width: 70px;">Kegiatan</td>
                            <td style="width: 50px" class="text-center">:</td>
                            <td><input type="text" name="kegiatan" class="form-control" required></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-4 my-3">
                    <table>
                        <tr>
                            <td style="width: 70px;">Mulai Sewa</td>
                            <td style="width: 50px" class="text-center">:</td>
                            <td><input type="date" name="mulai_sewa" class="form-control"></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-3 my-3">
                    <table>
                        <tr>
                            <td style="width: 70px;">Hari</td>
                            <td style="width: 50px" class="text-center">:</td>
                            <td>
                                <select name="hari" id="" class="form-select">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jum'at</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-3 my-3">
                    <table>
                        <tr>
                            <td style="width: 70px;">Jam</td>
                            <td style="width: 50px" class="text-center">:</td>
                            <td>
                                <select name="jam" id="" class="form-select">
                                    <option value="" selected>-- Pilih --</option>
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
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-10 mt-4">
                    <table>
                        <tr>
                            <td style="width: 70px;">Lama Sewa</td>
                            <td style="width: 50px" class="text-center">:</td>
                            <td>
                                <select name="lama_sewa" id="" class="form-select">
                                    <option value="">-- Pilih --</option>
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
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-10">
                    <button style="submit" class="btn btn-primary px-4 float-end">Input</button>
                </div>
            </div>
        </form>

        {{-- Tabel Data Jadwal --}}
        <div class="row justify-content-center border py-4">
            <div class="col-lg-10 text-center">
                <h3 class="fw-bold my-4">DATA JADWAL</h3>
            </div>
            <div class="col-lg-10 table-responsive">
                <table class="table table-hover table-bordered table-responsive">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Jenis Sewa</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Kegiatan</th>
                            <th scope="col" class="text-center">Mulai Sewa</th>
                            <th scope="col" class="text-center">Lama Sewa</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataJadwal as $data)
                            <tr>
                                <th class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center">{{ $data->lapang->jenis_sewa }}</td>
                                <td class="text-center">{{ $data->status }}</td>
                                <td class="text-center">{{ $data->kegiatan }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($data->mulai_sewa)->format('d-m-Y') }}/{{ $data->hari }}/{{ $data->jam }}</td>
                                <td class="text-center">{{ $data->lama_sewa }}
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editJadwal{{ $data->id }}"><i class="bi bi-pencil-square"></i></button>
                                    {{-- <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteJadwal{{ $data->id }}"><i class="bi bi-trash3"></i></button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Edit Jadwal --}}
    @include('page.admin.inputjadwal.edit')
    @include('page.admin.inputjadwal.delete')
@endsection
