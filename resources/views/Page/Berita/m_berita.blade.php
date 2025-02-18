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
                    <div class="border rounded d-flex align-items-center justify-content-center"
                        style="width: 100px; height: 100px; border: 2px solid blue;">
                        <span style="color: gray;">Gambar</span>
                    </div>
                </div>

                <!-- Judul Berita -->
                <div class="col-md-6">
                    <h6 class="m-0">VibeFour Mengalami Peningkatan Pengunjung</h6>
                </div>

                <!-- Tombol Aksi -->
                <div class="col-md-4 text-end">
                    <button class="btn btn-danger btn-sm btn-hapus-berita">Hapus Berita</button>
                    <a href="/edit_berita" class="btn btn-success btn-sm">Edit Berita</a>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btnHapusBerita = document.querySelectorAll(".btn-hapus-berita");

            btnHapusBerita.forEach(button => {
                button.addEventListener("click", function() {
                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Data berita akan dihapus!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire("Terhapus!", "Data berita telah dihapus.", "success");
                        }
                    });
                });
            });
        });
    </script>

@endsection
