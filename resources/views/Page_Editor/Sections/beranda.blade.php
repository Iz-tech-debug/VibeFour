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

        /* Styling Slideshow */
        .slideshow-container {
            margin-top: 20px;
        }

        .slideshow-preview .image-container {
            position: relative;
            display: inline-block;
        }

        .slideshow-preview .delete-button {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }

        .slideshow-input {
            display: flex;
            flex-direction: column;
        }

        .slideshow-preview {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 15px;
        }

        .slideshow-preview img {
            width: 150px;
            height: 75px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
        }

        .slideshow-preview .add-button {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 150px;
            height: 75px;
            border: 2px dashed #bbb;
            border-radius: 8px;
            font-size: 24px;
            color: #bbb;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .slideshow-preview .add-button:hover {
            background-color: #f9f9f9;
        }
    </style>

    {{-- END CSS --}}


    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <h4 class="mt-2" style="color:blueviolet;">Editor Halaman</h4>
        </div>

        <br>

        <div class="card p-4 shadow-sm">

            <div class="row mt-1">
                <div class="col-md-9">
                    <h5 class="mt-2">Beranda</h5>
                </div>
            </div>

            <hr>


            <form action="" method="post">

                <!-- Judul Halaman -->
                <div class="mb-4">
                    <label for="judulHalaman" class="form-label fw-bold">Judul Halaman:</label>
                    <input type="text" id="judulHalaman" class="form-control is-invalid" placeholder="Ketik disini....."
                        maxlength="100" required>
                    <div class="invalid-feedback">Judul halaman tidak boleh kosong.</div>
                </div>

                <!-- Logo -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Logo:</label>
                    <div class="mb-2">File Sekarang: <span class="text-warning">image/abc/def.jpg</span></div>
                    <input type="file" id="inputLogo" class="form-control mb-2" accept="image/*" required>
                    <img id="previewLogo" class="image-preview" src="#" alt="Pratinjau Logo" style="display: none;">
                    <i class="bi bi-info-circle"></i>
                    <small class="text-muted">Tambahkan gambar dengan rasio 1:1</small>
                </div>

                <!-- Banner Voting -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Video Panduan Voting:</label>
                    <div class="mb-2">File Sekarang: <span class="text-warning">image/abc/def.jpg</span></div>
                    <input type="file" class="form-control mb-2" title="Harap unggah video sebagai banner voting"
                        accept="video/*" required>
                    <img id="previewBannerVoting" class="image-preview" src="#" alt="Pratinjau Banner Voting"
                        style="display: none;">
                    <i class="bi bi-info-circle"></i>
                    <small class="text-muted">Tambahkan video dengan rasio 16:9</small>
                </div>

                <!-- Deskripsi Fitur Voting -->
                <div class="mb-4">
                    <label for="editorVoting" class="form-label fw-bold">Deskripsi Fitur Voting:</label>
                    <textarea id="editorVoting" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
                </div>

                <!-- Banner Penjadwalan -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Video Panduan Penjadwalan:</label>
                    <div class="mb-2">File Sekarang: <span class="text-warning">image/abc/def.jpg</span></div>
                    <input type="file" class="form-control mb-2" accept="video/*" required>
                    <i class="bi bi-info-circle"></i>
                    <small class="text-muted">Tambahkan video dengan rasio 16:9</small>
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
                            Tambahkan gambar dengan rasio 16:9
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
                    <input type="file" class="form-control" id="inputBackground" required>
                    <img id="previewBackground" class="image-preview" src="#" alt="Pratinjau Latar Belakang"
                        style="display: none;">
                    <i class="bi bi-info-circle"></i>
                    <small class="text-muted">Tambahkan gambar dengan rasio x:x</small>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>




        </div>

    </div>

    <script>
        // Pratinjau Gambar Slideshow
        const inputElement = document.getElementById('slideshowInput');
        const previewContainer = document.getElementById('slideshowPreview');
        const addButton = document.getElementById('addButton');

        inputElement.addEventListener('change', function(event) {
            const files = event.target.files;

            // Clear pratinjau sebelumnya
            const existingImages = previewContainer.querySelectorAll('.image-container');
            existingImages.forEach(container => container.remove());

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Buat elemen div sebagai container untuk gambar dan tombol hapus
                    const container = document.createElement('div');
                    container.classList.add('image-container');

                    // Buat elemen img untuk pratinjau
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = file.name;

                    // Buat tombol hapus
                    const deleteButton = document.createElement('button');
                    deleteButton.classList.add('delete-button');
                    deleteButton.textContent = 'X';
                    deleteButton.addEventListener('click', function() {
                        container.remove(); // Hapus gambar dari pratinjau
                    });

                    // Tambahkan img dan tombol hapus ke dalam container
                    container.appendChild(img);
                    container.appendChild(deleteButton);

                    // Tambahkan container ke pratinjau
                    previewContainer.insertBefore(container, addButton);
                };
                reader.readAsDataURL(file);
            });
        });

        // Fungsi umum untuk menambahkan pratinjau gambar
        function addImagePreview(inputId, previewId) {
            const inputElement = document.getElementById(inputId);
            const previewElement = document.getElementById(previewId);

            inputElement.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewElement.src = e.target.result;
                        previewElement.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewElement.style.display = 'none';
                }
            });
        }

        // Tambahkan pratinjau untuk setiap input gambar
        addImagePreview('inputLogo', 'previewLogo');
        addImagePreview('inputBannerVoting', 'previewBannerVoting');
        addImagePreview('inputBannerJadwal', 'previewBannerJadwal');
        addImagePreview('inputBackground', 'previewBackground');

        // Pencapaian
        let pencapaianCount = 0;

        function addPencapaian() {
            const container = document.getElementById('pencapaianContainer');
            const html = `
            <div class="row mt-2">
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger" onclick="removePencapaian(this)">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Isi Pencapaian">
                </div>
                <div class="col-md-4">
                    <input type="file" class="form-control" accept="image/*">
                    <i class="bi bi-info-circle"></i>
                    <small class="text-muted">Tambahkan ikon gambar dengan rasio 1:1</small>
                </div>
            </div>
        `;

            container.insertAdjacentHTML('beforeend', html);
            pencapaianCount++;
        }

        function removePencapaian(element) {
            element.closest('.row').remove();
            pencapaianCount--;
        }

        addButton.addEventListener('click', function() {
            inputElement.click();
        });

        window.addEventListener('click', function(e) {
            const dropdown = document.querySelector('.custom-dropdown');
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });
    </script>
@endsection
