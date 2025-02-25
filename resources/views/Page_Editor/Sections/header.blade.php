@extends('dashboard')

@section('title', 'Editor Halaman - Header')

@section('content')

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
                <h5 class="mt-2">Header - Bahasa Indonesia</h5>
            </div>

            <hr>

            <form action="#" method="post">
                @csrf

                <!-- Beranda -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="beranda" class="form-label mt-1 fw-bold">Beranda:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="beranda" name="beranda" class="form-control"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- Tentang -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="Tentang" class="form-label mt-1 fw-bold">Tentang:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Tentang" name="tentang" class="form-control"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="Kontak" class="form-label mt-1 fw-bold">Kontak:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Kontak" name="kontak" class="form-control"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- Produk -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="Produk" class="form-label mt-1 fw-bold">Produk:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Produk" name="produk" class="form-control"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- Dropdown Produk -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="produk_a" class="form-label mt-1 fw-bold">Drowpdown produk voting:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="produk_a" name="produk_a" class="form-control"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- Dropdown Produk -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="produk_b" class="form-label mt-1 fw-bold">Drowpdown produk penjdawalan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="produk_b" name="produk_b" class="form-control"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- Login Button -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="TeksTombol" class="form-label mt-1 fw-bold">Teks tombol masuk:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="TeksTombol" name="beranda" class="form-control"
                            placeholder="Ketik disini....." required>
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
