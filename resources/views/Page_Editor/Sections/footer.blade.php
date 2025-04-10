@extends('dashboard')

@section('title', 'Editor Halaman - Footer')

@section('content')

    <style>
        .ck-editor__editable {
            min-height: 250px;
        }
    </style>

    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <div class="row">
                <div class="col-md-9">
                    <h4 class="mt-2" style="color:blueviolet;">Editor Halaman</h4>
                </div>

                <div class="col-md text-end">
                    <select class="form-select" id="pilihBahasa" aria-label="Pilih Bahasa">
                        @foreach ($bahasa as $lang)
                            <option value="{{ $lang->id }}" {{ $bahasa_id == $lang->id ? 'selected' : '' }}>
                                Bahasa {{ $lang->nama_bahasa }}
                            </option>
                        @endforeach
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

            <form id="formFooter" action="{{ route('update.footer', ['bahasa' => 1]) }}" method="post">
                @csrf
                @method('put')

                <!-- Deskripsi Alamat -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-2">
                        <label for="editorAlamat" class="form-label fw-bold">Deskripsi Alamat :</label>
                    </div>

                    <div class="col-md">
                        <textarea id="editorAlamat" name="Alamat" class="editor" rows="5" placeholder="Ketik disini.....">{{ $data['Alamat'] ?? '' }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nomorWA" class="form-label fw-bold">Nomor Whatsapp:</label>
                        <div class="input-group">
                            <span class="input-group-text">+62</span>
                            <input type="number" id="nomorWA" name="NomorWA" class="form-control"
                                placeholder="Ketik disini....." value="{{ $data['NomorWA'] ?? '' }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="nomorCS" class="form-label fw-bold">Nomor pelayanan pengguna:</label>
                        <div class="input-group">
                            <span class="input-group-text">+62</span>
                            <input type="number" id="nomorCS" name="NomorCS" class="form-control"
                                placeholder="Ketik disini....." value="{{ $data['NomorCS'] ?? '' }}" required>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="produk" class="form-label fw-bold">Judul bagian produk:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="produk" name="Judul_Produk" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Judul_Produk'] ?? '' }}" required>
                    </div>
                </div>

                {{-- Produk Voting --}}
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="prodVote" class="form-label fw-bold">Produk Voting:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="prodVote" name="Produk_voting" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Produk_voting'] ?? '' }}" required>
                    </div>
                </div>

                {{-- Produk Penjadwalan --}}
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="prodJadwal" class="form-label fw-bold">Produk Penjadwalan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="prodJadwal" name="Produk_penjadwalan" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Produk_penjadwalan'] ?? '' }}" required>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="perusahaan" class="form-label fw-bold">Judul bagian perusahaan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="perusahaan" name="Perusahaan" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Perusahaan'] ?? '' }}" required>
                    </div>
                </div>

                <!-- About Us -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="tentang" class="form-label fw-bold">Tentang:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="tentang" name="Tentang" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Tentang'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Contact Us -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="Kontak" class="form-label fw-bold">Kontak:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Kontak" name="Kontak" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Kontak'] ?? '' }}" required>
                    </div>
                </div>

                <!-- News -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="Berita" class="form-label fw-bold">Berita:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Berita" name="Berita" class="form-control"
                            value="{{ $data['Berita'] ?? '' }}" placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- T&C -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="TNC" class="form-label fw-bold">Syarat dan Ketentuan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="TNC" name="Syarat_Ketentuan" class="form-control"
                            value="{{ $data['Syarat_Ketentuan'] ?? '' }}" placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- Privacy Policies -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="Kebijakan" class="form-label fw-bold">Kebijakan Privasi:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="Kebijakan" name="Kebijakan_Privasi" class="form-control"
                            value="{{ $data['Kebijakan_Privasi'] ?? '' }}" placeholder="Ketik disini....." required>
                    </div>
                </div>

                <!-- FAQ -->
                <div class="row mb-3">
                    <div class="col-md-3 mt-1">
                        <label for="FAQ" class="form-label fw-bold">FAQ:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="FAQ" name="FAQ" class="form-control"
                            value="{{ $data['FAQ'] ?? '' }}" placeholder="Ketik disini....." required>
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
            let editor;
            let formChanged = false;

            ClassicEditor.create($("#editorAlamat")[0])
                .then(newEditor => {
                    editor = newEditor;
                    editor.model.document.on('change:data', () => {
                        formChanged = true;
                    });
                })
                .catch(error => {
                    console.error(error);
                });
            $('#formFooter input, #formFooter textarea').on('input', function() {
                formChanged = true;
            });

            $('#pilihBahasa').on('change', function() {
                let bahasaId = $(this).val();
                let bahasaText = $("#pilihBahasa option:selected").text();
                let form = $('#formFooter');

                if (formChanged) {
                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Data yang telah Anda ubah akan disimpan sebelum berpindah bahasa.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, simpan & ganti bahasa",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            saveToDatabase().then(() => {
                                changeLanguage(bahasaId, bahasaText);
                            }).catch(() => {
                                Swal.fire("Error!", "Gagal menyimpan data!", "error");
                            });
                        } else {
                            $(this).val($(this).data('prev'));
                        }
                    });
                } else {
                    changeLanguage(bahasaId, bahasaText);
                }
            });

            $('#pilihBahasa').focus(function() {
                $(this).data('prev', $(this).val());
            });

            function saveToDatabase() {
                return new Promise((resolve, reject) => {
                    let formData = {
                        alamat: editor.getData(),
                        nomorWA: $('#nomorWA').val(),
                        nomorCS: $('#nomorCS').val(),
                        produk: $('#produk').val(),
                        prodVote: $('#prodVote').val(),
                        prodJadwal: $('#prodJadwal').val(),
                        perusahaan: $('#perusahaan').val(),
                        tentang: $('#tentang').val(),
                        kontak: $('#Kontak').val(),
                        berita: $('#Berita').val(),
                        TNC: $('#TNC').val(),
                        kebijakan: $('#Kebijakan').val(),
                        FAQ: $('#FAQ').val(),
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        _method: 'PUT'
                    };

                    $.ajax({
                        url: "/update_footer/" + $('#pilihBahasa').val(),
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

            function changeLanguage(bahasaId, bahasaText) {
                let form = $('#formFooter');
                $('#judulBahasa').text(bahasaText);
                form.attr('action', '/update_footer/' + bahasaId);

                $.ajax({
                    url: `/editor_halaman/footer/${bahasaId}`,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response) {
                            editor.setData(response.Alamat || '');
                            $('#nomorWA').val(response.NomorWA || '');
                            $('#nomorCS').val(response.NomorCS || '');
                            $('#produk').val(response.Judul_Produk || '');
                            $('#prodVote').val(response.Produk_voting || '');
                            $('#prodJadwal').val(response.Produk_penjadwalan || '');
                            $('#perusahaan').val(response.Perusahaan || '');
                            $('#tentang').val(response.Tentang || '');
                            $('#Kontak').val(response.Kontak || '');
                            $('#Berita').val(response.Berita || '');
                            $('#TNC').val(response.Syarat_Ketentuan || '');
                            $('#Kebijakan').val(response.Kebijakan_Privasi || '');
                            $('#FAQ').val(response.FAQ || '');
                        } else {
                            resetFields();
                        }
                        formChanged = false;
                    },
                    error: function() {
                        resetFields();
                    }
                });
            }

            function resetFields() {
                editor.setData('');
                $('#nomorWA, #nomorCS, #produk, #prodVote, #prodJadwal, #perusahaan, #tentang, #Kontak, #Berita, #TNC, #Kebijakan, #FAQ')
                    .val('');
            }
        });
    </script>

@endsection
