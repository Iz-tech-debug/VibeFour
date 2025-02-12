{{-- SA --}}

@include('Modal.Editor.sa')

<form action="#" method="post">
    @csrf

    <!-- Brand -->
    <div class="mb-4">
        <label for="brand" class="form-label fw-bold">Nama Brand:</label>
        <input type="text" id="brand" class="form-control is-invalid" placeholder="Ketik disini....." maxlength="100"
            required>
        <div class="invalid-feedback">Nama brand tidak boleh kosong.</div>
    </div>

    <!-- Keterangan Singkat -->
    <div class="mb-4">
        <label for="keterangan" class="form-label fw-bold">Keterangan Singkat:</label>
        <input type="text" id="keterangan" class="form-control is-invalid" placeholder="Ketik disini....."
            maxlength="100" required>
        <div class="invalid-feedback">Keterangan tidak boleh kosong.</div>
    </div>

    <!-- Gambar Latarbelakang -->
    <div class="mb-4">
        <label class="form-label fw-bold">Gambar Latar Belakang:</label>
        <div class="mb-2">File Sekarang: <span class="text-warning">image/abc/def.jpg</span></div>
        <input type="file" class="form-control" id="inputBackground" required>
        <img id="previewBackground" class="image-preview" src="#" alt="Pratinjau Latar Belakang"
            style="display: none;">
        <i class="bi bi-info-circle"></i>
        <small class="text-muted">Tambahkan gambar dengan rasio 16:9</small>
    </div>

    <div class="text-end">
        <button type="button" class="btn btn-primary" id="btnSimpan">
            Simpan
        </button>
    </div>

</form>

<script>
    document.getElementById('btnSimpan').addEventListener('click', function() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menyimpan ini?',
            text: 'Perubahan akan terjadi di website',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika dikonfirmasi, lakukan sesuatu
                Swal.fire({
                    title: 'Tersimpan!',
                    text: 'Data Anda telah disimpan.',
                    icon: 'success'
                });
            }
        });
    });
</script>
