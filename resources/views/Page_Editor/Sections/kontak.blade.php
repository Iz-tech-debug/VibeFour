@extends('dashboard')

@section('title', 'Editor Halaman - Kontak')

@section('content')

    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>

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

            <div class="row mt-1">
                <div class="col-md-9">
                    <h5 class="mt-2">Kontak - Bahasa </h5>
                </div>
            </div>

            <hr>

            <form id="formKontak" action="{{ route('update.kontak', ['bahasa' => 1]) }}" method="post">
                @csrf
                @method('put')


                {{-- Judul Halaman --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="judul" class="form-label mt-1 fw-bold">Judul halaman:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul" class="form-control" name="judul"
                            placeholder="Ketik disini....." value="{{ $data['Judul'] ?? '' }}" required>
                    </div>
                </div>

                {{-- Iframe Map --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="iframe" class="form-label mt-1 fw-bold">Iframe alamat perusahaan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="iframe" class="form-control" name="iframe"
                            placeholder="Ketik disini....." value="{{ $data['IFrame'] ?? '' }}" required>
                    </div>
                </div>

                {{-- Judul Keterangan Kontak --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="subjudul" class="form-label mt-1 fw-bold">Subjudul kontak:</label>
                    </div>

                    <div class="col-md"><input type="text" id="subjudul" class="form-control" name="subjudul"
                            placeholder="Ketik disini....." value="{{ $data['Subjudul'] ?? '' }}" required>
                    </div>
                </div>

                {{-- Keterangan --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="keterangan" class="form-label fw-bold">Keterangan:</label>
                    </div>

                    <div class="col-md">
                        <textarea name="keterangan" class="form-control editor" placeholder="Ketik disini....." id="keterangan">{{ $data['Keterangan'] ?? '' }}</textarea>
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="alamat" class="form-label mt-1 fw-bold">Alamat:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="alamat" class="form-control" name="alamat"
                            placeholder="Ketik disini....." value="{{ $data['Alamat'] ?? '' }}" required>
                    </div>
                </div>

                {{-- Kontak telepon --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="telepon" class="form-label mt-1 fw-bold">Kontak telepon:</label>
                    </div>

                    <div class="col-md"><input type="text" id="telepon" class="form-control" name="telepon"
                            placeholder="Ketik disini....." value="{{ $data['Telepon'] ?? '' }}" required>
                    </div>
                </div>

                {{-- Kontak email --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="email" class="form-label mt-1 fw-bold">Kontak e-mail:</label>
                    </div>

                    <div class="col-md"><input type="text" id="email" class="form-control" name="email"
                            placeholder="Ketik disini....." value="{{ $data['Email'] ?? '' }}" required>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary" id="btnSimpan">
                        <i class="bi bi-save me-1"></i>
                        Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>

    <script>
        $(document).ready(function() {
            let editor;
            let formChanged = false;

            ClassicEditor.create($("#keterangan")[0]) // jQuery selector perlu dikonversi ke elemen DOM
                .then(newEditor => {
                    editor = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            // Cek apakah ada perubahan di salah satu inputan
            $('#formKontak input, #formKontak textarea').on('input', function() {
                formChanged = true; // Jika ada perubahan, set formChanged menjadi true
            });

            $('#pilihBahasa').change(function() {
                if (formChanged) {
                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Data yang telah Anda masukkan akan disimpan sebelum berpindah bahasa.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, simpan & ganti bahasa",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            saveToDatabase().then(() => {
                                changeLanguage();
                            }).catch(() => {
                                Swal.fire("Error!", "Gagal menyimpan data!", "error");
                            });
                        } else {
                            $(this).val($(this).data('prev'));
                        }
                    });
                } else {
                    // Jika belum ada perubahan, langsung ganti bahasa
                    changeLanguage();
                }
            });

            // Menyimpan nilai sebelumnya agar bisa dikembalikan jika user batal
            $('#pilihBahasa').focus(function() {
                $(this).data('prev', $(this).val());
            });

            function saveToDatabase() {
                return new Promise((resolve, reject) => {
                    let bahasaSebelumnya = $('#pilihBahasa').data(
                    'prev'); // Ambil ID bahasa sebelum perubahan

                    let formData = {
                        judul: $('#judul').val(),
                        iframe: $('#iframe').val(),
                        subjudul: $('#subjudul').val(),
                        keterangan: editor.getData(),
                        alamat: $('#alamat').val(),
                        telepon: $('#telepon').val(),
                        email: $('#email').val(),
                        _token: $('meta[name="csrf-token"]').attr('content'), // Laravel CSRF Token
                        _method: 'PUT' // Gunakan PUT karena rute hanya mendukung metode PUT
                    };

                    $.ajax({
                        url: "/update_kontak/" +
                        bahasaSebelumnya, // Pakai bahasa sebelumnya, bukan yang baru
                        type: "POST", // tetap pakai POST, tapi Laravel akan mengenali sebagai PUT
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


            function changeLanguage() {
                var bahasaId = $('#pilihBahasa').val();
                var form = $('#formKontak');

                $.ajax({
                    url: '/editor-halaman/kontak/' + bahasaId,
                    type: 'GET',
                    success: function(response) {
                        form.attr('action', '/update_kontak/' + bahasaId);

                        if (response) {
                            $('#judul').val(response.Judul || '');
                            $('#iframe').val(response.IFrame || '');
                            $('#subjudul').val(response.Subjudul || '');
                            editor.setData(response.Keterangan || '');
                            $('#alamat').val(response.Alamat || '');
                            $('#telepon').val(response.Telepon || '');
                            $('#email').val(response.Email || '');
                        }

                        formChanged = false;
                    }
                });
            }
        });
    </script>
@endsection
