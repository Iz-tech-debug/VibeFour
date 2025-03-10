@extends('dashboard')

@section('title', 'Editor Halaman - Syarat & Ketentuan')

@section('content')

    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>

    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <div class="row">
                <div class="col-md">
                    <h4 class="mt-2" style="color:blueviolet;">Editor Halaman</h4>
                </div>

                <div class="col-md-3 mt-1 text-end">
                    <select class="form-select" aria-label="Pilih Bahasa">
                        <option value="1">Bahasa Indonesia</option>
                        <option value="2">Bahasa Inggris</option>
                    </select>
                </div>
            </div>
        </div>

        <br>

        <div class="card p-4 shadow-sm">

            <div class="row mt-1">
                <div class="col-md-9">
                    <h5 class="mt-2">Syarat & Ketentuan - Bahasa Indonesia</h5>
                </div>
            </div>

            <hr>

            <form action="" method="post">
                @csrf

                <!-- Judul Halaman -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="judul" class="form-label mt-2 fw-bold">Judul halaman:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul" name="judul" class="form-control"
                            placeholder="Ketik disini....." value="" required>
                    </div>
                </div>

                <!-- Kalimat sambutan -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="slogan" class="form-label mt-2 fw-bold">Kalimat sambutan:</label>
                    </div>

                    <div class="col-md">

                    </div>
                </div>

                <!-- Isi halaman -->
                <div class="mb-3">
                    <label for="editorIsi" class="form-label fw-bold">Isi halaman:</label>
                    <textarea id="editorIsi" name="editorIsi" class="editor" rows="5" placeholder="Ketik disini....."></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary" id="btnSimpan">
                        <i class="bi bi-save me-2"></i>Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>

    <script>
        $('#btnSimpan').on('click', function() {
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

@endsection
