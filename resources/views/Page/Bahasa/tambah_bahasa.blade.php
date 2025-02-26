@extends('dashboard')

@section('title', 'Tambah Bahasa')

@section('content')

    <div class="container mt-4">
        <!-- Header -->
        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Manajemen Bahasa</h4>
            <a href="/bahasa" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <br>

        <div class="card p-4 shadow-sm">
            <h5>Tambah Bahasa Baru</h5>

            <hr>

            <form method="post" action="{{ route('bahasa.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Nama Bahasa -->
                <div class="mb-3">
                    <label for="nama_bahasa" class="form-label">Nama Bahasa</label>
                    <input type="text" class="form-control" id="nama_bahasa" name="nama_bahasa"
                        placeholder="Contoh: Indonesia" required>
                    <span class="text-danger error-nama_bahasa"></span>
                </div>

                <!-- Ikon Bahasa -->
                <div class="mb-3">
                    <label for="ikon_bahasa" class="form-label">Ikon Bahasa</label>
                    <input type="file" class="form-control" id="ikon_bahasa" name="ikon_bahasa" accept="image/*"
                        required>
                    <small class="text-muted"><i class="bi bi-info-circle me-2"></i>Tambahkan ikon dengan rasio 1:1</small>
                    <span class="text-danger error-ikon_bahasa"></span>
                </div>

                <!-- Tombol Submit -->
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        
    </script>

@endsection
