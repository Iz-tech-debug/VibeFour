<form action="" method="post">

    <!-- Judul Halaman -->
    <div class="mb-4">
        <label for="judulHalaman" class="form-label fw-bold">Judul Halaman:</label>
        <input type="text" id="judulHalaman" class="form-control" placeholder="Ketik disini....." maxlength="100" required>
    </div>

    <!-- Logo -->
    <div class="mb-4">
        <label class="form-label fw-bold">Logo:</label>
        <div class="mb-2">File Sekarang: <span class="text-warning">image/abc/def.jpg</span></div>
        <input type="file" class="form-control mb-2" required>
        <i class="bi bi-info-circle"></i>
        <small class="text-muted">Tambahkan gambar dengan rasio x:x</small>
    </div>

    <!-- Banner Voting -->
    <div class="mb-4">
        <label class="form-label fw-bold">Banner Voting:</label>
        <div class="mb-2">File Sekarang: <span class="text-warning">image/abc/def.jpg</span></div>
        <input type="file" class="form-control mb-2" title="Harap unggah gambar sebagai banner voting" required>
        <i class="bi bi-info-circle"></i>
        <small class="text-muted">Tambahkan gambar dengan rasio x:x</small>
    </div>

    <!-- Deskripsi Fitur Voting -->
    <div class="mb-4">
        <label for="editorVoting" class="form-label fw-bold">Deskripsi Fitur Voting:</label>
        <textarea id="editorVoting" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
    </div>

    <!-- Banner Penjadwalan -->
    <div class="mb-4">
        <label class="form-label fw-bold">Banner Penjadwalan:</label>
        <div class="mb-2">File Sekarang: <span class="text-warning">image/abc/def.jpg</span></div>
        <input type="file" class="form-control mb-2" accept="image/*" required>
        <i class="bi bi-info-circle"></i>
        <small class="text-muted">Tambahkan gambar dengan rasio x:x</small>
    </div>

    <!-- Deskripsi Fitur Jadwal -->
    <div class="mb-2">
        <label for="editorJadwal" class="form-label fw-bold">Deskripsi Fitur Jadwal:</label>
        <textarea id="editorJadwal" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
    </div>

    <hr>

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

    <hr>

    <div class="slideshow-container">
        <label for="slideshowInput" class="form-label fw-bold">Dokumentasi Slideshow:</label>

        <div class="slideshow-input mt-2">
            <input type="file" id="slideshowInput" class="form-control" accept="image/*" required multiple>
            <small class="text-muted mt-2">
                <i class="bi bi-info-circle"></i>
                Tambahkan gambar dengan rasio x:x
            </small>
        </div>

        <div class="slideshow-preview" id="slideshowPreview">
            <div class="add-button" id="addButton">+</div>
        </div>
    </div>

    <hr>

    <!-- Background -->
    <div class="mb-4">
        <label class="form-label fw-bold">Gambar Latar Belakang:</label>
        <div class="mb-2">File Sekarang: <span class="text-warning">image/abc/def.jpg</span></div>
        <div class="input-group mb-2">
            <input type="file" class="form-control" accept="image/*" required>
        </div>
        <div class="form-text">
            <i class="bi bi-info-circle"></i>
            <small class="text-muted">Tambahkan gambar dengan rasio x:x</small>
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
