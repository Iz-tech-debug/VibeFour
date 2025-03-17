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
                    <select class="form-select" id="pilihBahasa">
                        @foreach ($bahasa as $item)
                            <option value="{{ $item->id }}" {{ $bahasa_id == $item->id ? 'selected' : '' }}>
                                Bahasa {{ $item->nama_bahasa }}
                            </option>
                        @endforeach
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

            <form id="formHeader" action="{{ route('update.header', ['bahasaId' => 1]) }}" method="post">
                @csrf
                @method('put')

                <!-- Beranda -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="beranda" class="form-label mt-1 fw-bold">Beranda:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="beranda" name="beranda" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Beranda'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Tentang -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="Tentang" class="form-label mt-1 fw-bold">Tentang:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Tentang" name="tentang" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Tentang'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="Kontak" class="form-label mt-1 fw-bold">Kontak:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Kontak" name="kontak" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Kontak'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Produk -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="Produk" class="form-label mt-1 fw-bold">Produk:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Produk" name="produk" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Produk'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Dropdown Produk -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="produk_a" class="form-label mt-1 fw-bold">Dropdown produk voting:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="produk_a" name="produk_a" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Produk Voting'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Dropdown Produk -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="produk_b" class="form-label mt-1 fw-bold">Drowpdown produk penjdawalan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="produk_b" name="produk_b" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Produk Penjadwalan'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Login Button -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="TeksTombol" class="form-label mt-1 fw-bold">Teks tombol masuk:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="TeksTombol" name="teks_tombol" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Teks Masuk'] ?? '' }}" required>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary" id="btnSimpan">
                        <i class="bi bi-save me-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#pilihBahasa').change(function() {
                var bahasaId = $(this).val();
                var form = $('#formHeader');

                console.log("Form action berubah ke: " + form.attr('action')); // Debugging

                $.ajax({
                    url: '/editor_halaman/header/' + bahasaId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {

                        form.attr('action', '/update_header/' + bahasaId);

                        if (response) {
                            $('#beranda').val(response.Beranda || '');
                            $('#Tentang').val(response.Tentang || '');
                            $('#Kontak').val(response.Kontak || '');
                            $('#Produk').val(response.Produk || '');
                            $('#produk_a').val(response['Produk Voting'] || '');
                            $('#produk_b').val(response['Produk Penjadwalan'] || '');
                            $('#TeksTombol').val(response['Teks Masuk'] || '');
                        } else {
                            kosongkanForm();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", status, error);
                        kosongkanForm();
                    }
                });

                function kosongkanForm() {
                    $('#beranda, #Tentang, #Kontak, #Produk, #produk_a, #produk_b, #TeksTombol').val('');
                }
            });
        });
    </script>
@endsection
