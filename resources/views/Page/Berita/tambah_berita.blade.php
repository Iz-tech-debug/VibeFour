@extends('dashboard')

@section('title', 'Tambah Berita')

@section('content')

    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>

    <div class="container mt-4">

        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Tambah Berita</h4>

            <a href="{{ route('page.m_berita') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <br>

        <div class="card p-4 shadow-sm">
            <form action="/add_berita" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Foto Berita --}}
                <div class="mb-3">
                    <label for="gambarBerita" class="form-label fw-bold">Gambar Berita</label>
                    <input type="file" id="gambarBerita" class="form-control" name="gambar" accept="image/*">
                    <label for="gambarBerita" class="form-text mt-2"><i class="bi bi-info-circle me-2"></i>Tambahkan gambar
                        dengan rasio 4:3</label>
                </div>

                {{-- Judul Berita --}}
                <div class="mb-4">
                    <label for="judulBerita" class="form-label fw-bold">Judul Berita:</label>
                    <input type="text" id="judulBerita" name="judul" class="form-control"
                        placeholder="Ketik disini....." maxlength="100" required>
                    <div class="invalid-feedback">Judul berita tidak boleh kosong.</div>
                </div>

                {{-- Isi Berita --}}
                <div class="mb-4">
                    <label for="isiBerita" class="form-label fw-bold">Isi Berita</label>
                    <textarea name="isi_konten" id="isiBerita" class="editor" placeholder="Ketik disini....."></textarea>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4 mt-2">
                                <label for="bahasa_id" class="form-label fw-bold">Simpan sebagai:</label>
                            </div>

                            <div class="col-md-5">
                                <select name="bahasa_id" id="bahasa_id" class="form-select" required>
                                    <option value=""><--- Pilih Bahasa ---></option>
                                    @foreach ($bahasa as $item)
                                        <option value="{{ $item->id }}">
                                            Bahasa {{ $item->nama_bahasa }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Bahasa tidak boleh kosong.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
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



        })
    </script>

@endsection
