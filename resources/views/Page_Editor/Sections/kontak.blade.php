@extends('dashboard')

@section('title', 'Editor Halaman - Kontak')

@section('content')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <h4 class="mt-2" style="color:blueviolet;">Editor Halaman</h4>
        </div>

        <br>

        <div class="card p-4 shadow-sm">

            <div class="row mt-1">
                <div class="col-md-9">
                    <h5 class="mt-2">Kontak</h5>
                </div>
            </div>

            <hr>

            <form action="#" method="post">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="judul" class="form-label fw-bold">Judul Halaman:</label>
                    <input type="text" id="judul" class="form-control is-invalid" name="judul" placeholder="Ketik disini....."
                        required>
                    <div class="invalid-feedback">Judul halaman tidak boleh kosong.</div>
                </div>

                <div class="mb-3">
                    <label for="linkFrame" class="form-label fw-bold">IFrame Alaamat Perusahaan:</label>
                    <input type="text" id="linkFrame" class="form-control is-invalid" name="iframe" placeholder="Ketik disini....."
                        required>
                    <div class="invalid-feedback">IFrame tidak boleh kosong.</div>
                </div>

                <div class="mb-3">
                    <label for="judulKeterangan" class="form-label fw-bold">Judul Keterangan Kontak:</label>
                    <input type="text" id="judulKeterangan" class="form-control is-invalid" name="judul" placeholder="Ketik disini....."
                        required>
                    <div class="invalid-feedback">Judul keterangan kontak tidak boleh kosong.</div>
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label fw-bold">Keterangan:</label>
                    <textarea name="keterangan" class="form-control editor" placeholder="Ketik disini....." id=""></textarea>
                    <div class="invalid-feedback">Kontak tidak boleh kosong.</div>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label fw-bold">Alamat:</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Ketik disini....." id=""></input type="text">
                    <div class="invalid-feedback">Kontak tidak boleh kosong.</div>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label fw-bold">Kontak Telepon:</label>
                    <input type="text" name="telepon" class="form-control" placeholder="Ketik disini....." id=""></input type="text">
                    <div class="invalid-feedback">Kontak tidak boleh kosong.</div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Kontak Email:</label>
                    <input type="text" name="email" class="form-control" placeholder="Ketik disini....." id=""></input type="text">
                    <div class="invalid-feedback">Kontak tidak boleh kosong.</div>
                </div>

            </form>

        </div>

    </div>
@endsection
