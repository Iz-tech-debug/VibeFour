@extends('dashboard')

@section('title', 'Editor Halaman')

@section('content')

    <style>
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
                    <h5 class="mt-2">Pilih Halaman</h5>
                </div>

                <div class="col-md-3">
                    <form method="GET" action="{{ route('editor.halaman') }}">
                        <select class="form-select" name="page" onchange="this.form.submit()">
                            <option value="halaman_depan" {{ request('page') == 'halaman_depan' ? 'selected' : '' }}>Halaman
                                Depan</option>
                            <option value="footer" {{ request('page') == 'footer' ? 'selected' : '' }}>
                                Footer</option>
                            <option value="halaman-header" {{ request('page') == 'header' ? 'selected' : '' }}>
                                Header</option>
                            <option value="halaman-tentang" {{ request('page') == 'tentang' ? 'selected' : '' }}>
                                Tentang</option>
                            <option value="halaman-produk" {{ request('page') == 'produk' ? 'selected' : '' }}>
                                Produk</option>
                            <option value="halaman-s&k" {{ request('page') == 's&k' ? 'selected' : '' }}>Syarat &
                                Ketentuan</option>
                            <option value="halaman-faq" {{ request('page') == 'faq' ? 'selected' : '' }}>F.A.Q
                            </option>
                            <option value="halaman-kebijakan"
                                {{ request('page') == 'halaman_kebijakan' ? 'selected' : '' }}>Kebijakan Privasi</option>
                            <option value="halaman-kontak" {{ request('page') == 'kontak' ? 'selected' : '' }}>
                                Kontak</option>
                        </select>
                    </form>
                </div>
            </div>

            <hr>

            {{-- Menampilkan form sesuai opsi yang dipilih --}}
            @if (request('page'))
                @include('Page_Editor.Sections.' . request('page'))
            @endif

            
        </div>

    </div>

    {{-- Modal Modal Modallll! --}}

    <script>
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
                                    <small class="text-muted">Tambahkan ikon gambar dengan rasio x:x</small>
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
