@foreach ($dataPenyewaan as $item)
    <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Hapus Data Penyewaan <span
                            class="text-danger">{{ $item->user->username }}</span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/dataPenyewaan/{{ $item->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body d-flex justify-content-center">
                        <h4>Apakah kamu yakin akan menghapus data ini?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary px-4">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
