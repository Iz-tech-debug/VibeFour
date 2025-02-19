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

            <form action="#" method="post">
                @csrf

                <div class="mb-3">
                    <label for="editorDescIDN" class="form-label fw-bold">Halaman Syarat & Ketentuan:</label>
                    <textarea id="editorDescIDN" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
                </div>

                <div class="text-end">
                    <button type="button" class="btn btn-primary" id="btnSimpan">
                        Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>

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

@endsection
