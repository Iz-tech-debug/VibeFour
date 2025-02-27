<div class="modal fade" id="edtBahasa{{ $item->id }}" tabindex="-1" aria-labelledby="editBahasaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBahasaModalLabel">Edit Bahasa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bahasa.update', $item->id) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('put')

                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="shadow-sm rounded-circle"
                            style="width: 100px; height: 100px;" alt="">
                    </div>

                    <div class="mb-3">
                        <label for="nama_bahasa" class="form-label">Nama Bahasa:</label>
                        <input type="text" class="form-control" id="nama_bahasa" name="nama_bahasa"
                            value="{{ $item->nama_bahasa }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="ikon_bahasa" class="form-label">Ikon:</label>
                        <input type="file" class="form-control" id="ikon_bahasa" name="ikon_bahasa" accept="image/*">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
