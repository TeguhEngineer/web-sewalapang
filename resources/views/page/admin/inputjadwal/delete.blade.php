{{-- Modal Delete JAdwal --}}
@foreach ($dataJadwal as $item)
    <div class="modal fade" id="deleteJadwal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/inputJadwal/{{ $item->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body text-center">
                        <h5>Anda yakin ingin menghapus jadwal ini?</h5>
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
