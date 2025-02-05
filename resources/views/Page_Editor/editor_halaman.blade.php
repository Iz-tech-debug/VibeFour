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
    </style>
    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <h4 class="" style="color:blueviolet;">Editor Halaman</h4>
        </div>

        <br>


        <div class="card p-4 shadow-sm">

            <div class="row mb-1">
                <div class="col-md-8">
                    <h5 class="mt-2">Pilih Halaman</h5>
                </div>

                <div class="col-md-4">
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
            <div class="container mt-2">
                <h4>Pencapaian:</h4>

                <i class="bi bi-info-circle"></i>
                <small class="text-muted">Tambahkan ikon gambar dengan rasio x:x</small>

            </div>

            <!-- Tombol Simpan -->
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

        // Tutup dropdown jika klik di luar area dropdown
        window.addEventListener('click', function(e) {
            const dropdown = document.querySelector('.custom-dropdown');
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });

    </script>

@endsection
