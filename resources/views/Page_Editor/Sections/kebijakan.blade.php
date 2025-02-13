{{-- SA --}}

@include('Modal.Editor.sa')

<form action="#" method="post">
    @csrf

    {{-- Deskripsi Kebijakan Privasi --}}
    <div class="mb-3">
        {{-- Deskripsi Kebijakan Privasi IDN --}}
        <label for="editorPPIDN" class="form-label fw-bold">Halaman Kebijakan Privasi Bahasa
            Indonesia:</label>
        <textarea id="editorPPIDN" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
    </div>

    <div class="mb-4">
        {{-- Deskripsi Kebijakan Privasi ENG --}}
        <label for="editorPPENG" class="form-label fw-bold">Halaman Kebijakan Privasi Bahasa Inggris:</label>
        <textarea id="editorPPENG" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
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
