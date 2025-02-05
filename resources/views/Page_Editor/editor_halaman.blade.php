@extends('dashboard')

@section('title', 'Editor Halaman')

@section('content')
    <div class="container mt-4">

        <div class="card p-2 shadow-sm">
            <h4 class="">Editor Halaman</h4>
        </div>

        <br>


        <div class="card p-4 shadow-sm">
            <div class="row align-items-center mb-4">

                <div class="col-md-4">
                    <h5 class="mb-3">Pilih Halaman</h5>
                </div>

                <div class="col-md-8">
                    <select class="form-select" id="selectPage">
                        <option value="halaman-depan" selected>Halaman Depan</option>
                        <option value="halaman-tentang">Tentang</option>
                        <option value="halaman-kontak">Kontak</option>
                    </select>
                </div>
            </div>

            <hr>

            <!-- Judul Halaman -->
            <div class="mb-4">
                <label for="judulHalaman" class="form-label fw-bold">Judul Halaman:</label>
                <input type="text" id="judulHalaman" class="form-control" placeholder="Ketik disini.....">
            </div>

            <!-- Logo -->
            <div class="mb-4">
                <label class="form-label fw-bold">Logo:</label>
                <div class="mb-2">File Sekarang: <span class="text-warning">image/abc/def.jpg</span></div>
                <input type="file" class="form-control mb-2">
                <i class="bi bi-info-circle"></i>
                <small class="text-muted">Tambahkan gambar dengan rasio x:x</small>
            </div>

            <!-- Banner Voting -->
            <div class="mb-4">
                <label class="form-label fw-bold">Banner Voting:</label>
                <div class="mb-2">File Sekarang: <span class="text-warning">image/abc/def.jpg</span></div>
                <input type="file" class="form-control mb-2">
                <i class="bi bi-info-circle"></i>
                <small class="text-muted">Tambahkan gambar dengan rasio x:x</small>
            </div>

            <!-- Deskripsi Fitur Voting -->
            <div class="mb-4">
                <label for="deskripsiVoting" class="form-label fw-bold">Deskripsi Fitur Voting:</label>
                <textarea id="deskripsiVoting" class="form-control" rows="5" placeholder="Ketik disini....."></textarea>
            </div>

            <!-- Banner Penjadwalan -->
            <div class="mb-4">
                <label class="form-label fw-bold">Banner Penjadwalan:</label>
                <div class="mb-2">File Sekarang: <span class="text-warning">image/abc/def.jpg</span></div>
                <input type="file" class="form-control mb-2">
                <i class="bi bi-info-circle"></i>
                <small class="text-muted">Tambahkan gambar dengan rasio x:x</small>
            </div>

            <!-- Deskripsi Fitur Jadwal -->
            <div class="mb-4">
                <label for="editor" class="form-label fw-bold">Deskripsi Fitur Jadwal:</label>
                <textarea id="editor" class="form-control" rows="5" placeholder="Ketik disini....."></textarea>
            </div>

            <hr>

            <!-- Pencapaian -->
            <div class="mb-4">
                <label for="pencapaian" class="form-label fw-bold">Pencapaian:</label>
                <textarea id="pencapaian" class="form-control" rows="3" placeholder="Isi deskripsi disini....."></textarea>
            </div>

            <!-- Tombol Simpan -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>

@endsection
