@extends('dashboard')

@section('title', 'Edit Berita')

@section('content')

    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>

    <div class="container mt-4">

        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Edit Berita</h4>

            <a href="/manajemen_berita" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <br>

        <div class="card p-4 shadow-sm">
            <form action="{{ route('berita.update', $news->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Gunakan PUT untuk update data -->

                {{-- Foto Berita --}}
                <div class="mb-4 text-center">
                    <label for="gambarBerita" class="form-label fw-bold">Gambar Berita</label>
                    <input type="file" id="gambarBerita" name="gambar" class="form-control" accept="image/*">
                    <br>
                    <img src="{{ asset('storage/' . $news->gambar) }}" alt="Gambar Berita" class="img-fluid rounded shadow">
                </div>

                {{-- Judul Berita --}}
                <div class="mb-4">
                    <label for="judulBerita" class="form-label fw-bold">Judul Berita:</label>
                    <input type="text" id="judulBerita" name="judul" class="form-control" value="{{ $news->judul }}"
                        required>
                </div>

                {{-- Isi Berita --}}
                <div class="mb-4">
                    <label for="isiBerita" class="form-label fw-bold">Isi Berita</label>
                    <textarea name="konten" id="isiBerita" class="editor form-control">{{ $news->konten }}</textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>

    </div>


    <script>
        $(document).ready(function() {
            let editor;
            let formChanged = false;

            ClassicEditor.create($("#isiBerita")[0]) // jQuery selector perlu dikonversi ke elemen DOM
                .then(newEditor => {
                    editor = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
