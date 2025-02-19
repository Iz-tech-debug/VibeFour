@extends('dashboard')

@section('title', 'Editor Halaman - Beranda')

@section('content')

    {{-- START CSS --}}
    <style>
        .image-preview {
            margin-top: 10px;
            max-width: 150px;
            max-height: 150px;
            border: 1px solid #ddd;
            border-radius: 8px;
            object-fit: cover;
        }

        .ck-editor__editable {
            min-height: 200px;
        }
    </style>

    {{-- END CSS --}}

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

            <div class="row mb-2">
                <h5 class="mt-2">Beranda - Bahasa Indonesia</h5>
            </div>

            <hr>

            <form action="" method="post">

                <!-- Judul Halaman -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="slogan" class="form-label mt-2 fw-bold">Slogan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="slogan" name="" class="form-control"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- Keterangan Aplikasi / Slogan -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="keterangan" class="form-label mt-2 fw-bold">Keterangan singkat:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="keterangan" name="" class="form-control"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- Slideshow Tampilan Aplikasi -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-2">
                        <label class="form-label fw-bold">Slideshow Tampilan Aplikasi:</label>
                    </div>

                    <div class="col-md">

                        <img id="imagePreview" class="image-preview" src="#" alt="Pratinjau Latar Belakang"
                            style="display: none;">

                        <input type="file" class="form-control" id="imageAplikasi" accept="image/*" required>

                        <div class="row">
                            <div class="col">

                            </div>

                            <div class="col mt-2 text-end">
                                <i class="bi bi-info-circle"></i>
                                <small class="text-muted">Tambahkan gambar dengan rasio 4:3</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fitur Keunggulan -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-2">
                        <label for="editorVoting" class="form-label fw-bold">Deskripsi Fitur Voting:</label>
                    </div>

                    <div class="col-md">
                        <textarea id="editorVoting" class="editor" placeholder="Ketik disini....." required></textarea>
                    </div>
                </div>


                <!-- Pencapaian -->
                <div class="mt-2">
                    <label for="editorPencapaian" class="form-label fw-bold">Pencapaian: </label>

                    <div class="mt-2">

                        <div class="mt-2">

                            <button type="button" class="btn btn-success mb-2" onclick="addPencapaian()">
                                <i class="bi bi-plus-lg"></i> Tambah Pencapaian
                            </button>

                            <div id="pencapaianContainer">
                            </div>

                        </div>

                    </div>
                </div>


                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>

    </div>

    <script></script>
@endsection
