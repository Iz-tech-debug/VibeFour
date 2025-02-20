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
                        <label class="form-label fw-bold">Slideshow tampilan aplikasi:</label>
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
                        <label for="editorVoting" class="form-label fw-bold">Deskripsi fitur unggulan:</label>
                    </div>

                    <div class="col-md">
                        <textarea id="editorVoting" class="editor" placeholder="Ketik disini....." required></textarea>
                    </div>
                </div>

                <!-- Judul pencapaian -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="judul_pencapaian" class="form-label mt-2 fw-bold">Judul pencapaian:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul_pencapaian" name="judul_pencapian" class="form-control"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- Deskripsi pencapaian -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-2">
                        <label for="editorDesk" class="form-label fw-bold">Deskripsi pencapaian:</label>
                    </div>

                    <div class="col-md">
                        <textarea id="editorDesk" class="editor" name="deskripsiPencapaian" placeholder="Ketik disini....." required></textarea>
                    </div>
                </div>

                <!-- Pencapaian -->
                <div class="row mt-2">

                    <div class="col-md-3">
                        <label class="form-label fw-bold mt-1">Pencapaian:</label>
                    </div>

                    <div class="col-md">
                        <button type="button" class="btn btn-success mb-1" id="tambahPencapaian">
                            <i class="bi bi-plus"></i> Tambah Pencapaian
                        </button>

                        <small class="ms-2"><i class="bi bi-info-circle">Tambahkan ikon dengan rasio 1:1</i></small>
                    </div>

                    <div id="listPencapaian" class="mt-2">
                        <div class="row mb-3 pencapaian-item align-items-center">
                            <!-- Kolom Input -->
                            <div class="col-md-11">
                                <div class="row mb-2">
                                    <div class="col-md">
                                        <input type="file" name="pencapaian_image[]" class="form-control"
                                            accept="image/*" required>
                                    </div>
                                    <div class="col-md">
                                        <input type="text" name="pencapaian_judul[]" class="form-control"
                                            placeholder="Judul Pencapaian" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <input type="text" name="pencapaian_keterangan[]" class="form-control"
                                            placeholder="Keterangan Pencapaian" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom Button Hapus -->
                            <div class="col-md-1 text-end">
                                <button type="button" class="btn btn-danger hapusPencapaian"><i
                                        class="bi bi-trash"></i></button>
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

    <script>
        $(document).ready(function() {
            // Tambah Pencapaian
            $("#tambahPencapaian").click(function() {
                let pencapaianHTML = `
        <hr>
        <div class="row mb-3 pencapaian-item align-items-center">
            <!-- Kolom Input -->
            <div class="col-md-11">
                <div class="row mb-2">
                    <div class="col-md">
                        <input type="file" name="pencapaian_image[]" class="form-control" accept="image/*" required>
                    </div>
                    <div class="col-md">
                        <input type="text" name="pencapaian_judul[]" class="form-control"
                            placeholder="Judul Pencapaian" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <input type="text" name="pencapaian_keterangan[]" class="form-control"
                            placeholder="Keterangan Pencapaian" required>
                    </div>
                </div>
            </div>

            <!-- Kolom Button Hapus -->
            <div class="col-md-1 text-end">
                <button type="button" class="btn btn-danger hapusPencapaian"><i class="bi bi-trash"></i></button>
            </div>
        </div>`;

                $("#listPencapaian").append(pencapaianHTML);
            });

            // Hapus Pencapaian
            $(document).on("click", ".hapusPencapaian", function() {
                $(this).closest(".pencapaian-item").remove();
            });
        });
    </script>
@endsection
