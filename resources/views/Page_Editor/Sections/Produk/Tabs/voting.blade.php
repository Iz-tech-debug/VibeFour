<div class="tab-pane fade" id="voting">

    <form action="" method="post">

        <!-- Judul Halaman -->
        <div class="row mb-4">
            <div class="col-md-3">
                <label for="judul" class="form-label mt-2 fw-bold">Judul halaman:</label>
            </div>

            <div class="col-md">
                <input type="text" id="judul" name="" class="form-control" placeholder="Ketik disini....."
                    required>
            </div>
        </div>

        <!-- Deskripsi Halaman -->
        <div class="row mb-4">
            <div class="col-md-3">
                <label for="deskripsiEditor" class="form-label mt-2 fw-bold">Deskripsi halaman:</label>
            </div>

            <div class="col-md">
                <input type="text" id="deskripsiEditor" name="deskripsi_hal" class="editor"
                    placeholder="Ketik disini....." required>
            </div>
        </div>

        <!-- Button Coba -->
        <div class="row mb-4">
            <div class="col-md-3">
                <label for="teks_btncoba" class="form-label mt-2 fw-bold">Teks button coba:</label>
            </div>

            <div class="col-md">
                <input type="text" id="teks_btncoba" name="teks_btncoba" class="form-control"
                    placeholder="Ketik disini....." required>
            </div>
        </div>

        <!-- Button Tutorial -->
        <div class="row mb-4">
            <div class="col-md-3">
                <label for="teks_btntutor" class="form-label mt-2 fw-bold">Teks button tutorial:</label>
            </div>

            <div class="col-md">
                <input type="text" id="teks_btntutor" name="teks_btntutor" class="form-control"
                    placeholder="Ketik disini....." required>
            </div>
        </div>

        <!-- Video Tutorial Voting -->
        <div class="row mb-4">
            <div class="col-md-3">
                <label for="video_tutor" class="form-label mt-2 fw-bold">Video tutorial:</label>
            </div>

            <div class="col-md">
                <input type="file" id="video_tutor" name="video_tutor" class="form-control" accept="video/*"
                    required>
            </div>
        </div>

        <!-- Foto Produk -->
        <div class="row mb-4">
            <div class="col-md-3">
                <label for="foto_produk" class="form-label mt-2 fw-bold">Foto produk:</label>
            </div>

            <div class="col-md">
                <input type="file" id="foto_produk" name="foto_produk" class="form-control" accept="image/*"
                    required>
            </div>
        </div>

        <hr>

        <!-- Slideshow Voting -->
        <div class="row mb-4">
            <div class="col-md-3">
                <label for="slideshowVote" class="form-label mt-2 fw-bold">Slideshow produk voting:</label>
            </div>

            <div class="col-md">
                <input type="file" id="slideshowVote" name="slideshowVote" class="form-control" accept="image/*"
                    multiple required>
            </div>
        </div>

        <!-- Teks Judul Produk -->
        <div class="row mb-4">
            <div class="col-md-3">
                <label for="judul_produk" class="form-label mt-2 fw-bold">Teks button tutorial:</label>
            </div>

            <div class="col-md">
                <input type="text" id="judul_produk" name="judul_produk" class="form-control"
                    placeholder="Ketik disini....." required>
            </div>
        </div>

        {{-- Keunggulan --}}
        <div class="row mb-3 mt-2">
            <div class="col-md-3 mt-1">
                <label class="form-label fw-bold">Keunggulan produk:</label>
            </div>

            <div class="col-md">
                <button type="button" class="btn btn-success mb-1" id="tambahKeunggulanV"><i class="bi bi-plus"></i>
                    Tambah Keunggulan
                </button>

                <small class="ms-2"><i class="bi bi-info-circle">Tambahkan ikon dengan rasio 1:1</i></small>

                <div id="listKeunggulanVote" class="mt-2">
                    <div class="row mb-3 keunggulanV-item align-items-center">
                        <!-- Kolom Input -->
                        <div class="col-md-11">
                            <div class="row mb-2">
                                <div class="col-md">
                                    <input type="file" name="keunggulanV_image[]" class="form-control"
                                        accept="image/*" required>
                                </div>
                                <div class="col-md">
                                    <input type="text" name="keunggulanV_judul[]" class="form-control"
                                        placeholder="Judul Keunggulan" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <input type="text" name="keunggulanV_keterangan[]" class="form-control"
                                        placeholder="Keterangan Keunggulan" required>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Button Hapus -->
                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-danger hapusKeunggulanV"><i
                                    class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button Save -->
        <div class="row">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

    </form>

</div>

<script></script>
