@extends('dashboard')

@section('title', 'Editor Halaman')

@section('content')
    <style>
        /* Dropdown */
        .custom-dropdown {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .dropdown-btn {
            width: 100%;
            background-color: #fff;
            color: #333;
            border: 1px solid #ddd;
            padding: 10px 15px;
            border-radius: 8px;
            text-align: left;
            cursor: pointer;
        }

        .dropdown-btn::after {
            content: '▼';
            float: right;
            font-size: 12px;
        }

        .dropdown-list {
            display: none;
            position: absolute;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 5px;
            z-index: 1000;
        }

        .dropdown-list li {
            list-style: none;
            padding: 10px 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dropdown-list li::before {
            content: '';
            display: inline-block;
            width: 10px;
            height: 10px;
            background-color: blue;
            border-radius: 50%;
        }

        .dropdown-list li:hover {
            background-color: #f5f5f5;
        }

        .custom-dropdown.active .dropdown-list {
            display: block;
        }

        /* Styling Slideshow */
        .slideshow-container {
            margin-top: 20px;
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
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
        }

        .slideshow-preview .add-button {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            height: 100px;
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
    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <h4 class="" style="color:blueviolet;">Editor Halaman</h4>
        </div>

        <br>


        <div class="card p-4 shadow-sm">

            <div class="row mt-1">
                <div class="col-md-9">
                    <h5 class="mt-2">Pilih Halaman</h5>
                </div>

                <div class="col-md-3">
                    <div class="custom-dropdown">
                        <div class="dropdown-btn" onclick="toggleDropdown()">Halaman Depan</div>
                        <ul class="dropdown-list">
                            <li onclick="selectOption(this, 'Halaman Depan')">Halaman Depan</li>
                            <li onclick="selectOption(this, 'Footer')">Footer</li>
                            <li onclick="selectOption(this, 'Tentang')">Tentang</li>
                            <li onclick="selectOption(this, 'Produk')">Produk</li>
                            <li onclick="selectOption(this, 'S&K')">S&K</li>
                            <li onclick="selectOption(this, 'F.A.Q')">F.A.Q</li>
                            <li onclick="selectOption(this, 'Kebijakan Privasi')">Kebijakan Privasi</li>
                            <li onclick="selectOption(this, 'Kontak')">Kontak</li>
                        </ul>
                    </div>
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
                <label for="editorVoting" class="form-label fw-bold">Deskripsi Fitur Voting:</label>
                <textarea id="editorVoting" class="editor" rows="5" placeholder="Ketik disini....."></textarea>
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
            <div class="mb-2">
                <label for="editorJadwal" class="form-label fw-bold">Deskripsi Fitur Jadwal:</label>
                <textarea id="editorJadwal" class="editor" rows="5" placeholder="Ketik disini....."></textarea>
            </div>

            <hr>

            <!-- Pencapaian -->
            <div class="mt-2">
                <h4>Pencapaian:</h4>

                <i class="bi bi-info-circle"></i>
                <small class="text-muted">Tambahkan ikon gambar dengan rasio x:x</small>

            </div>

            <hr>

            <div class="slideshow-container">
                <h4 class="mb-2">Slideshow: </h4>

                <div class="slideshow-input">
                    <label for="slideshowInput" class="form-label">Pilih file gambar</label>
                    <input type="file" id="slideshowInput" class="form-control" accept="image/*" multiple>
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
                    <input type="file" class="form-control">
                    <button class="btn btn-outline-secondary" type="button">Pilih File</button>
                </div>
                <div class="form-text">
                    <i class="bi bi-info-circle"></i>
                    <small class="text-muted">Tambahkan gambar dengan rasio x:x</small>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

    </div>

    {{-- Modal Modal Modallll! --}}

    <script>
        // Dropdown
        function toggleDropdown() {
            const dropdown = document.querySelector('.custom-dropdown');
            dropdown.classList.toggle('active');
        }

        function selectOption(element, value) {
            // Update teks tombol dropdown
            const dropdownBtn = document.querySelector('.dropdown-btn');
            dropdownBtn.innerText = value;

            // Sembunyikan dropdown setelah memilih
            const dropdown = document.querySelector('.custom-dropdown');
            dropdown.classList.remove('active');
        }

        // Pratinjau Gambar
        const inputElement = document.getElementById('slideshowInput');
        const previewContainer = document.getElementById('slideshowPreview');
        const addButton = document.getElementById('addButton');

        inputElement.addEventListener('change', function(event) {
            const files = event.target.files;

            // Clear pratinjau sebelumnya
            const existingImages = previewContainer.querySelectorAll('img');
            existingImages.forEach(img => img.remove());

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Buat elemen img untuk pratinjau
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = file.name;

                    // Tambahkan ke pratinjau
                    previewContainer.insertBefore(img, addButton);
                };
                reader.readAsDataURL(file);
            });
        });

        // Tambahkan klik pada tombol tambah
        addButton.addEventListener('click', function() {
            inputElement.click();
        });

        // Tutup dropdown jika klik di luar area dropdown
        window.addEventListener('click', function(e) {
            const dropdown = document.querySelector('.custom-dropdown');
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });
    </script>

@endsection
