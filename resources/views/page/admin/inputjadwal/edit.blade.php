{{-- Modal Edit JAdwal --}}
@foreach ($dataJadwal as $item)
    <div class="modal fade" id="editJadwal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jadwal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/inputJadwal/{{ $item->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-8">

                                <label for="">Jenis Sewa</label>
                                <select name="jenissewa_id" id="" class="form-select">
                                    <option value="{{ $item->lapang->id }}" selected>{{ $item->lapang->jenis_sewa }}</option>
                                    @foreach ($dataLapang as $items)
                                        <option value="{{ $items->id }}">{{ $items->jenis_sewa }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">

                                <label for="">Status</label>
                                <input type="text" name="status" class="form-control" value="{{ $item->status }}">
                            </div>
                        </div>


                        <label for="">Kegiatan</label>
                        <input type="text" name="kegiatan" class="form-control" value="{{ $item->kegiatan }}">
                        <div class="row">

                            <div class="col-4">
                                <label for="">Mulai Sewa</label>
                                <input type="date" name="mulai_sewa" class="form-control"
                                    value="{{ $item->mulai_sewa }}">
                            </div>
                            <div class="col-4">
                                <label for="">Hari</label>
                                <select name="hari" id="" class="form-select">
                                    <option value="{{ $item->hari }}" selected>{{ $item->hari }}</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jum'at</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Jam</label>
                                <select name="jam" id="" class="form-select">
                                    <option value="{{ $item->jam }}" selected>{{ $item->jam }}</option>
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
                            </div>
                        </div>

                        <label for="">Lama Sewa</label>
                        <select name="lama_sewa" id="" class="form-select">
                            <option value="{{ $item->lama_sewa }}" selected>{{ $item->lama_sewa }}</option>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
