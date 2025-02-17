@extends('dashboard')

@section('title', 'Manajemen Berita')

@section('content')

    <div class="container mt-4">

        <!-- Header -->
        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Manajemen Berita</h4>

            <a href="/tambah_berita" class="btn btn-primary">
                <i class="bi bi-plus"></i> Tambah Berita
            </a>
        </div>

        <br>

        <!-- Daftar Berita -->
        <div class="card p-4 shadow-sm">
            <div class="row align-items-center">
                <!-- Gambar -->
                <div class="col-md-2 text-center">
                    <div class="border rounded d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; border: 2px solid blue;">
                        <span style="color: gray;">Gambar</span>
                    </div>
                </div>

                <!-- Judul Berita -->
                <div class="col-md-6">
                    <h6 class="m-0">VibeFour Mengalami Peningkatan Pengunjung</h6>
                </div>

                <!-- Tombol Aksi -->
                <div class="col-md-4 text-end">
                    <button class="btn btn-danger btn-sm">Hapus Berita</button>
                    <button class="btn btn-success btn-sm">Edit Berita</button>
                </div>
            </div>
        </div>

    </div>

@endsection
