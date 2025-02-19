@extends('dashboard')

@section('title', 'Editor Halaman - Footer')

@section('content')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <div class="row">
                <div class="col-md-9">
                    <h4 class="mt-2" style="color:blueviolet;">Editor Halaman</h4>
                </div>

                <div class="col-md text-end">
                    <select class="form-select" aria-label="Pilih Bahasa">
                        <option value="1">Bahasa Indonesia</option>
                        <option value="2">Bahasa Inggris</option>
                    </select>
                </div>
            </div>
        </div>

        <br>

        <div class="card p-4 shadow-sm">

            <div class="row mt-1">
                <div class="col-md-9">
                    <h5 class="mt-2">Footer</h5>
                </div>
            </div>

            <hr>

            <form action="#" method="post">
                @csrf

                <!-- Deskripsi Alamat -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-2">
                        <label for="editorAlamat" class="form-label fw-bold">Deskripsi Alamat :</label>
                    </div>

                    <div class="col-md">
                        <textarea id="editorAlamat" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nomorWA" class="form-label fw-bold">Nomor Whatsapp:</label>
                        <div class="input-group">
                            <span class="input-group-text">+62</span>
                            <input type="number" id="nomorWA" class="form-control" placeholder="Ketik disini....."
                                oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="nomorCS" class="form-label fw-bold">Nomor Pelayanan Pengguna:</label>
                        <div class="input-group">
                            <span class="input-group-text">+62</span>
                            <input type="number" id="nomorCS" class="form-control" placeholder="Ketik disini....."
                                oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                        </div>
                    </div>
                </div>

                <hr>

                {{-- Produk Voting --}}
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="prodVote" class="form-label fw-bold">Produk Voting:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="prodVote" class="form-control" placeholder="Ketik disini....." required>
                    </div>
                </div>

                {{-- Produk Penjadwalan --}}
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="prodJadwal" class="form-label fw-bold">Produk Penjadwalan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="prodJadwal" class="form-control" placeholder="Ketik disini....." required>
                    </div>
                </div>

                <hr>

                <!-- About Us -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="tentang" class="form-label fw-bold">Tentang:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="tentang" class="form-control" placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- Contact Us -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="Kontak" class="form-label fw-bold">Kontak:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Kontak" class="form-control" placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- News -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="Berita" class="form-label fw-bold">Berita:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Berita" class="form-control" placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- T&C -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="S&K" class="form-label fw-bold">Syarat dan Ketentuan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="S&K" class="form-control" placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- Privacy Policies -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="Kebijakan" class="form-label fw-bold">Kebijakan Privasi:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Kebijakan" class="form-control" placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- FAQ -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="FAQ" class="form-label fw-bold">FAQ:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="FAQ" class="form-control" placeholder="Ketik disini....." required>
                    </div>
                </div>

                <div class="text-end">
                    <button type="button" class="btn btn-primary" id="btnSimpan">
                        Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>

    <script>
        document.getElementById('btnSimpan').addEventListener('click', function() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menyimpan ini?',
                text: 'Perubahan akan terjadi di website',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika dikonfirmasi, lakukan sesuatu
                    Swal.fire({
                        title: 'Tersimpan!',
                        text: 'Data Anda telah disimpan.',
                        icon: 'success'
                    });
                }
            });
        });
    </script>

@endsection
