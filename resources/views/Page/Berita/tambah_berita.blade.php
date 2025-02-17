@extends('dashboard')

@section('title', 'Tambah Berita')

@section('content')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Tambah Berita</h4>

            <a href="/manajemen_berita" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <br>

        <div class="card p-4 shadow-sm">
            <form action="" method="post">
                @csrf

                {{-- Foto Berita --}}
                <div class="mb-4">
                    <label for="gambarBerita" class="form-label fw-bold">Gambar Berita</label>
                    <input type="file" id="gambarBerita" class="form-control" accept="image/*">
                </div>

                {{-- Judul Berita --}}
                <div class="mb-4">
                    <label for="judulBerita" class="form-label fw-bold">Judul Berita:</label>
                    <input type="text" id="judulBerita" class="form-control" placeholder="Ketik disini....."
                        maxlength="100" required>
                    <div class="invalid-feedback">Judul berita tidak boleh kosong.</div>
                </div>

                {{-- Isi Berita --}}
                <div class="mb-4">
                    <label for="isiBerita" class="form-label fw-bold">Isi Berita</label>
                    <textarea name="isi_berita" id="isiBerita" class="editor"></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>

    </div>

@endsection
