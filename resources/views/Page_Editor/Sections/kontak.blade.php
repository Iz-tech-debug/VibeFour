@extends('dashboard')

@section('title', 'Editor Halaman - Kontak')

@section('content')

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
                    <h5 class="mt-2">Kontak - Bahasa Indonesia</h5>
                </div>
            </div>

            <hr>

            <form action="#" method="post">
                @csrf
                @method('put')

                {{-- Judul Halaman --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="judul" class="form-label mt-1 fw-bold">Judul halaman:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul" class="form-control" name="judul"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                {{-- Iframe Map --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="iframe" class="form-label mt-1 fw-bold">Alamat iframe perusahaan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="iframe" class="form-control" name="iframe"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                {{-- Judul Keterangan Kontak --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="subjudul" class="form-label mt-1 fw-bold">Subjudul kontak:</label>
                    </div>

                    <div class="col-md"><input type="text" id="subjudul" class="form-control" name="subjudul"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                {{-- Keterangan --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="keterangan" class="form-label fw-bold">Keterangan:</label>
                    </div>

                    <div class="col-md">
                        <textarea name="keterangan" class="form-control editor" placeholder="Ketik disini....." id=""></textarea>
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="alamat" class="form-label mt-1 fw-bold">Alamat:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="alamat" class="form-control" name="alamat"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                {{-- Kontak telepon --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="no_telp" class="form-label mt-1 fw-bold">Kontak telepon:</label>
                    </div>

                    <div class="col-md"><input type="text" id="no_telp" class="form-control" name="no_telp"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                {{-- Kontak email --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="email" class="form-label mt-1 fw-bold">Kontak e-mail:</label>
                    </div>

                    <div class="col-md"><input type="text" id="email" class="form-control" name="email"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button type="button" class="btn btn-primary" id="btnSimpan">
                        <i class="bi bi-save me-1"></i>
                        Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>

    <script>
        $(document).ready(function() {
            // Sweetalert Simpan
            $("#btnSimpan").on("click", function() {
                Swal.fire({
                    title: "Apakah Anda yakin ingin menyimpan ini?",
                    text: "Perubahan akan terjadi di website",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Simpan",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Tersimpan!",
                            text: "Data Anda telah disimpan.",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script>
@endsection
