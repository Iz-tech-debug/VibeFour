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
                        <input type="text" id="beranda" name="Beranda" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Beranda'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Tentang -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="Tentang" class="form-label mt-1 fw-bold">Tentang:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Tentang" name="Tentang" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Tentang'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="Kontak" class="form-label mt-1 fw-bold">Kontak:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Kontak" name="Kontak" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Kontak'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Produk -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="Produk" class="form-label mt-1 fw-bold">Produk:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Produk" name="Produk" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Produk'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Dropdown Produk -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="produk_a" class="form-label mt-1 fw-bold">Dropdown produk voting:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="produk_a" name="ProdukVoting" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['ProdukVoting'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Dropdown Produk -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="produk_b" class="form-label mt-1 fw-bold">Drowpdown produk penjdawalan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="produk_b" name="ProdukPenjadwalan" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['ProdukPenjadwalan'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Login Button -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-1">
                        <label for="TeksTombol" class="form-label mt-1 fw-bold">Teks tombol masuk:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="TeksTombol" name="TeksMasuk" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['TeksMasuk'] ?? '' }}" required>
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
            let formChanged = false;

            $('#formHeader input').on('input', function() {
                formChanged = true;
            });

            $('#pilihBahasa').on('change', function() {
                let bahasaId = $(this).val();
                let form = $('#formHeader');

                if (formChanged) {
                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Perubahan belum disimpan. Simpan sebelum berpindah bahasa?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, Simpan & Ganti",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            saveHeaderData().then(() => {
                                changeHeaderLanguage(bahasaId);
                            }).catch(() => {
                                Swal.fire("Error!", "Gagal menyimpan data!", "error");
                            });
                        } else {
                            $(this).val($(this).data('prev'));
                        }
                    });
                } else {
                    changeHeaderLanguage(bahasaId);
                }
            });

            $('#pilihBahasa').focus(function() {
                $(this).data('prev', $(this).val());
            });

            function saveHeaderData() {
                return new Promise((resolve, reject) => {
                    let formData = $('#formHeader').serialize();

                    $.ajax({
                        url: $('#formHeader').attr('action'),
                        type: "POST",
                        data: formData,
                        success: function(response) {
                            Swal.fire("Tersimpan!", "Data berhasil disimpan.", "success");
                            formChanged = false;
                            resolve();
                        },
                        error: function(xhr) {
                            reject(xhr);
                        }
                    });
                });
            }

            function changeHeaderLanguage(bahasaId) {
                let form = $('#formHeader');
                form.attr('action', '/update_header/' + bahasaId);

                $.ajax({
                    url: `/editor_halaman/header/${bahasaId}`,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response) {
                            $('#beranda').val(response.Beranda || '');
                            $('#Tentang').val(response.Tentang || '');
                            $('#Kontak').val(response.Kontak || '');
                            $('#Produk').val(response.Produk || '');
                            $('#produk_a').val(response.ProdukVoting || '');
                            $('#produk_b').val(response.ProdukPenjadwalan || '');
                            $('#TeksTombol').val(response.TeksMasuk || '');
                        } else {
                            resetHeaderFields();
                        }
                        formChanged = false;
                    },
                    error: function() {
                        resetHeaderFields();
                    }
                });
            }

            function resetHeaderFields() {
                $('#beranda, #Tentang, #Kontak, #Produk, #produk_a, #produk_b, #TeksTombol').val('');
            }
        });
    </script>
@endsection
