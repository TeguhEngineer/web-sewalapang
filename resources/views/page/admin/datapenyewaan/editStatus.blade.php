@foreach ($dataPenyewaan as $item)
    <div class="modal fade" id="editStatus{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Ubah Status Penyewaan <span
                            class="text-warning">{{ $item->user->username }}</span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/dataPenyewaan/{{ $item->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body d-flex justify-content-center">
                        <table>
                            <tr>
                                <td>
                                    <label for="">Status Penyewaan</label>
                                </td>
                                <td>:</td>
                                <td style="width: 100px;">
                                    <select name="status" id="" class="form-select">
                                        @if ($item->status == 'aktif')
                                            <option value="{{ $item->id }}">{{ ucfirst($item->status) }}</option>
                                            <option value="selesai">Selesai</option>
                                        @elseif ($item->status == 'selesai')
                                            <option value="{{ $item->id }}">{{ ucfirst($item->status) }}</option>
                                            <option value="aktif">Aktif</option>
                                        @endif
                                    </select>
                                </td>
                            </tr>
                        </table>
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
