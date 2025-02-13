{{-- SA --}}

@include('Modal.Editor.sa')

<form action="#" method="post">
    @csrf

    {{-- Deskripsi S&K --}}
    <div class="mb-3">
        {{-- Deskripsi S&K IDN --}}
        <label for="editorDescIDN" class="form-label fw-bold">Halaman Syarat & Ketentuan Bahasa
            Indonesia:</label>
        <textarea id="editorDescIDN" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
    </div>

    <div class="mb-4">
        {{-- Deskripsi S&K ENG --}}
        <label for="editorDescENG" class="form-label fw-bold">Halaman Syarat & Ketentuan Bahasa Inggris:</label>
        <textarea id="editorDescENG" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
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
