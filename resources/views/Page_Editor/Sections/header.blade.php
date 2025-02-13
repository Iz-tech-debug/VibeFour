{{-- SA --}}

@include('Modal.Editor.sa')

<form action="#" method="post">
    @csrf

    <!-- Beranda -->
    <div class="mb-3">
        <label for="beranda" class="form-label fw-bold">Beranda:</label>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Bahasa Indonesia</span>
                    <input type="text" id="beranda" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">

                    <span class="input-group-text">Bahasa Inggris</span>
                    <input type="text" id="beranda" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>
        </div>
    </div>

    <!-- Tentang -->
    <div class="mb-3">
        <label for="tentang" class="form-label fw-bold">Tentang:</label>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Bahasa Indonesia</span>
                    <input type="text" id="tentang" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">

                    <span class="input-group-text">Bahasa Inggris</span>
                    <input type="text" id="tentang" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>
        </div>
    </div>

    <!-- Kontak -->
    <div class="mb-3">
        <label for="kontak" class="form-label fw-bold">Kontak:</label>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Bahasa Indonesia</span>
                    <input type="text" id="kontak" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">

                    <span class="input-group-text">Bahasa Inggris</span>
                    <input type="text" id="kontak" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk -->
    <div class="mb-3">
        <label for="produk" class="form-label fw-bold">Produk:</label>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Bahasa Indonesia</span>
                    <input type="text" id="produk" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">

                    <span class="input-group-text">Bahasa Inggris</span>
                    <input type="text" id="produk" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Masuk -->
    <div class="mb-3">
        <label for="login" class="form-label fw-bold">Tombol masuk akun:</label>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Bahasa Indonesia</span>
                    <input type="text" id="login" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">

                    <span class="input-group-text">Bahasa Inggris</span>
                    <input type="text" id="login" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>
        </div>
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
