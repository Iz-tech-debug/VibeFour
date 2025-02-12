{{-- SA --}}

@include('Modal.Editor.sa')

<form action="#" method="post">
    @csrf

    {{-- Brand  --}}
    <div class="mb-3">
        <label for="brand" class="form-label fw-bold">Nama Brand:</label>
        <input type="text" id="brand" class="form-control is-invalid" placeholder="Ketik disini....." required>
        <div class="invalid-feedback">Nama brand tidak boleh kosong.</div>
    </div>

    {{-- Keterangan Singkat IDN --}}
    <div class="mb-3">
        <label for="keteranganIDN" class="form-label fw-bold">Keterangan Bahasa Indonesia Singkat:</label>
        <input type="text" id="keteranganIDN" class="form-control is-invalid" placeholder="Ketik disini....."
            required>
        <div class="invalid-feedback">Keterangan tidak boleh kosong.</div>
    </div>

    {{-- Keterangan Singkat ENG --}}
    <div class="mb-3">
        <label for="keteranganENG" class="form-label fw-bold">Keterangan Bahasa Inggris Singkat:</label>
        <input type="text" id="keteranganENG" class="form-control is-invalid" placeholder="Ketik disini....."
            required>
        <div class="invalid-feedback">Keterangan tidak boleh kosong.</div>
    </div>

    {{-- Gambar Latar Belakang --}}
    <div class="mb-3">
        <label class="form-label fw-bold">Gambar Latar Belakang:</label>
        <div class="mb-2">File Sekarang: <span class="text-warning">image/abc/def.jpg</span></div>
        <input type="file" class="form-control" id="inputBackground" accept="image/*" required>
        <img id="previewBackground" class="image-preview" src="#" alt="Pratinjau Latar Belakang"
            style="display: none;">
        <i class="bi bi-info-circle"></i>
        <small class="text-muted">Tambahkan gambar dengan rasio 16:9</small>
    </div>

    <hr>

    {{-- Deskripsi Perusahaan --}}
    <div class="row mb-3">
        <div class="col-md-6">
            {{-- Deskripsi Perusahaan IDN --}}
            <label for="editorDescIDN" class="form-label fw-bold">Deskripsi Identitas Perusahaan Bahasa
                Indonesia:</label>
            <textarea id="editorDescIDN" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
        </div>
        <div class="col-md-6">
            {{-- Deskripsi Perusahaan ENG --}}
            <label for="editorDescENG" class="form-label fw-bold">Deskripsi Identitas Perusahaan Bahasa Inggris:</label>
            <textarea id="editorDescENG" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
        </div>
    </div>

    <hr>

    {{-- Misi Perusahaan --}}
    <div class="row mb-3">
        <div class="col-md-6">
            {{-- Misi Perusahaan IDN --}}
            <label for="editorMisIDN" class="form-label fw-bold">Misi Perusahaan Bahasa
                Indonesia:</label>
            <textarea id="editorDescIDN" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
        </div>
        <div class="col-md-6">
            {{-- Misi Perusahaan ENG --}}
            <label for="editorMisENG" class="form-label fw-bold">Misi Perusahaan Bahasa Inggris:</label>
            <textarea id="editorDescENG" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
        </div>
    </div>

    <hr>

    {{-- Keunggulan Perusahaan --}}
    <div class="row mb-3">
        <label for="editorKeunggulan" class="form-label fw-bold">Keunggulan Perusahaan: </label>

        <div class="mt-2">

            <div class="mt-2">

                <button type="button" class="btn btn-success mb-2" onclick="addPencapaian()">
                    <i class="bi bi-plus-lg"></i> Tambah Keunggulan
                </button>

                <div id="keunggulanContainer">
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

    // Pencapaian
    let keunggulan = 0;

    function addPencapaian() {
        const container = document.getElementById('keunggulanContainer');
        const html = `
            <div class="row mt-3 justify-content-center">
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger" onclick="hapusKeunggulan(this)">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
                <div class="col-md-5">
                    <input type="text" name="" class="form-control" placeholder="Isi Keunggulan Bahasa Indonesia">
                </div>
                <div class="col-md-5">
                    <input type="text" name="" class="form-control" placeholder="Isi Keunggulan Bahasa Inggris">
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', html);
        keunggulan++;
    }

    function hapusKeunggulan(element) {
        element.closest('.row').remove();
        keunggulan--;
    }
</script>
