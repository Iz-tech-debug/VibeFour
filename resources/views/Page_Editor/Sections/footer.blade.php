{{-- SA --}}

@include('Modal.Editor.sa')

<form action="#" method="post">
    @csrf

    <!-- Facebook -->
    <div class="mb-4">
        <label for="linkFB" class="form-label fw-bold">Tautan Facebook:</label>
        <input type="text" id="linkFB" class="form-control is-invalid" placeholder="Ketik disini....." required>
        <div class="invalid-feedback">Tautan facebook tidak boleh kosong.</div>
    </div>

    <!-- X/Twitter -->
    <div class="mb-4">
        <label for="linkX" class="form-label fw-bold">Tautan Twitter / X:</label>
        <input type="text" id="linkX" class="form-control is-invalid" placeholder="Ketik disini....." required>
        <div class="invalid-feedback">Judul Twitter/X tidak boleh kosong.</div>
    </div>

    <!-- Facebook -->
    <div class="mb-4">
        <label for="linkYT" class="form-label fw-bold">Tautan Youtube:</label>
        <input type="text" id="linkYT" class="form-control is-invalid" placeholder="Ketik disini....." required>
        <div class="invalid-feedback">Tautan Youtube tidak boleh kosong.</div>
    </div>

    <!-- Instagram -->
    <div class="mb-4">
        <label for="linkIG" class="form-label fw-bold">Tautan Instagram:</label>
        <input type="text" id="linkIG" class="form-control is-invalid" placeholder="Ketik disini....." required>
        <div class="invalid-feedback">Tautan Instagram tidak boleh kosong.</div>
    </div>

    <!-- Whatsapp -->
    <div class="mb-4">
        <label for="noWA" class="form-label fw-bold">Nomor Whatsapp:</label>
        <input type="text" id="noWA" class="form-control is-invalid" placeholder="Ketik disini....." required>
        <div class="invalid-feedback">Nomor Whatsapp tidak boleh kosong.</div>
    </div>

    <!-- CS -->
    <div class="mb-4">
        <label for="noCS" class="form-label fw-bold">Nomor Layanan Pengguna:</label>
        <input type="text" id="noCS" class="form-control is-invalid" placeholder="Ketik disini....." required>
        <div class="invalid-feedback">Nomor Layanan Pengguna tidak boleh kosong.</div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <label for="produkVoting" class="form-label fw-bold">Tautan Produk Voting:</label>
            <input type="text" id="produkVoting" class="form-control" placeholder="Ketik disini....." required>
        </div>
        <div class="col-md-6">
            <label for="produkPenjadwalan" class="form-label fw-bold">Tautan Produk Penjadwalan:</label>
            <input type="text" id="produkPenjadwalan" class="form-control" placeholder="Ketik disini....." required>
        </div>
    </div>

    <hr>

    <!-- About Us -->
    <div class="mb-4">
        <label for="linkAbt" class="form-label fw-bold">Tautan Tentang:</label>
        <input type="text" id="linkAbt" class="form-control is-invalid" placeholder="Ketik disini....." required>
        <div class="invalid-feedback">Tautan halaman tentang tidak boleh kosong.</div>
    </div>

    <!-- Contact Us -->
    <div class="mb-4">
        <label for="linkCtc" class="form-label fw-bold">Tautan Kontak:</label>
        <input type="text" id="linkCtc" class="form-control is-invalid" placeholder="Ketik disini....." required>
        <div class="invalid-feedback">Tautan halaman kontak tidak boleh kosong.</div>
    </div>

    <!-- News -->
    <div class="mb-4">
        <label for="linkNws" class="form-label fw-bold">Tautan Berita:</label>
        <input type="text" id="linkNws" class="form-control is-invalid" placeholder="Ketik disini....." required>
        <div class="invalid-feedback">Tautan halaman berita tidak boleh kosong.</div>
    </div>

    <!-- T&C -->
    <div class="mb-4">
        <label for="linkS&K" class="form-label fw-bold">Tautan S&K:</label>
        <input type="text" id="linkS&K" class="form-control is-invalid" placeholder="Ketik disini....." required>
        <div class="invalid-feedback">Tautan halaman S&K tidak boleh kosong.</div>
    </div>

    <!-- Privacy Policies -->
    <div class="mb-4">
        <label for="linkT&C" class="form-label fw-bold">Tautan Kebijakan & Privasi:</label>
        <input type="text" id="linkT&C" class="form-control is-invalid" placeholder="Ketik disini....."
            required>
        <div class="invalid-feedback">Tautan halaman kebijakan dan privasi tidak boleh kosong.</div>
    </div>

    <!-- Whatsapp -->
    <div class="mb-4">
        <label for="linkFAQ" class="form-label fw-bold">Tautan F.A.Q:</label>
        <input type="text" id="linkFAQ" class="form-control is-invalid" placeholder="Ketik disini....."
            required>
        <div class="invalid-feedback">Tautan halaman F.A.Q tidak boleh kosong.</div>
    </div>

    <!-- Deskripsi Alamat -->
    <div class="mb-2">
        <label for="editorAlamat" class="form-label fw-bold">Alamat :</label>
        <textarea id="editorAlamat" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
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
