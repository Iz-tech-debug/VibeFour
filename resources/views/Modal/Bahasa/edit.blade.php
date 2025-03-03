<div class="modal fade" id="edtBahasa{{ $item->id }}" tabindex="-1" aria-labelledby="editBahasaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBahasaModalLabel">Edit Bahasa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bahasa.update', $item->id) }}" method="post" enctype="multipart/form-data"
                    id="editBahasaForm{{ $item->id }}">

                    @csrf
                    @method('put')

                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="shadow-sm rounded-circle"
                            style="width: 100px; height: 100px;" alt="">
                    </div>

                    <div class="mb-3">
                        <label for="nama_bahasa" class="form-label">Nama Bahasa:</label>
                        <input type="text" class="form-control nama_bahasa" id="nama_bahasa_{{ $item->id }}"
                            name="nama_bahasa" value="{{ $item->nama_bahasa }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="ikon_bahasa" class="form-label">Ikon:</label>
                        <input type="file" class="form-control ikon_bahasa" id="ikon_bahasa_{{ $item->id }}"
                            name="ikon_bahasa" accept="image/*">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btnSimpan" id="btnSimpan_{{ $item->id }}"
                            disabled>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let form = $("#editBahasaForm{{ $item->id }}");
        let inputNama = $("#nama_bahasa_{{ $item->id }}");
        let inputIkon = $("#ikon_bahasa_{{ $item->id }}");
        let btnSimpan = $("#btnSimpan_{{ $item->id }}");

        let originalNama = inputNama.val();

        function checkChanges() {
            let isNamaChanged = inputNama.val() !== originalNama;
            let isIkonChanged = inputIkon[0].files.length > 0;
            btnSimpan.prop("disabled", !(isNamaChanged || isIkonChanged));
        }

        inputNama.on("input", checkChanges);
        inputIkon.on("change", checkChanges);
    });
</script>
