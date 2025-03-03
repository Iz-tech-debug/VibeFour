@extends('dashboard')

@section('title', 'Editor Halaman - Kontak')

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
                        @foreach ($bahasa as $item)
                            <option value="{{ $item->id }}">Bahasa {{ $item->nama_bahasa }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <br>

        <div class="card p-4 shadow-sm">

            <div class="row mt-1">
                <div class="col-md-9">
                    <h5 class="mt-2">Kontak - Bahasa </h5>
                </div>
            </div>

            <hr>

            <form action="{{ route('update.kontak', $bahasa_id) }}" method="post">
                @csrf
                @method('put')

                {{-- Judul Halaman --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="judul" class="form-label mt-1 fw-bold">Judul halaman:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul" class="form-control" name="judul"
                            placeholder="Ketik disini....." value="{{ $data['Judul'] ?? '' }}" required>
                    </div>
                </div>

                {{-- Iframe Map --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="iframe" class="form-label mt-1 fw-bold">Iframe alamat perusahaan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="iframe" class="form-control" name="iframe"
                            placeholder="Ketik disini....." value="{{ $data['IFrame'] ?? '' }}" required>
                    </div>
                </div>

                {{-- Judul Keterangan Kontak --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="subjudul" class="form-label mt-1 fw-bold">Subjudul kontak:</label>
                    </div>

                    <div class="col-md"><input type="text" id="subjudul" class="form-control" name="subjudul"
                            placeholder="Ketik disini....." value="{{ $data['Subjudul'] ?? '' }}" required>
                    </div>
                </div>

                {{-- Keterangan --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="keterangan" class="form-label fw-bold">Keterangan:</label>
                    </div>

                    <div class="col-md">
                        <textarea name="keterangan" class="form-control editor" placeholder="Ketik disini....." id="">{{ $data['Keterangan'] ?? '' }}</textarea>
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="alamat" class="form-label mt-1 fw-bold">Alamat:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="alamat" class="form-control" name="alamat"
                            placeholder="Ketik disini....." value="{{ $data['Alamat'] ?? '' }}" required>
                    </div>
                </div>

                {{-- Kontak telepon --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="no_telp" class="form-label mt-1 fw-bold">Kontak telepon:</label>
                    </div>

                    <div class="col-md"><input type="text" id="no_telp" class="form-control" name="no_telp"
                            placeholder="Ketik disini....." value="{{ $data['Telepon'] ?? '' }}" required>
                    </div>
                </div>

                {{-- Kontak email --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="email" class="form-label mt-1 fw-bold">Kontak e-mail:</label>
                    </div>

                    <div class="col-md"><input type="text" id="email" class="form-control" name="email"
                            placeholder="Ketik disini....." value="{{ $data['Email'] ?? '' }}" required>
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

        });
    </script>
@endsection
