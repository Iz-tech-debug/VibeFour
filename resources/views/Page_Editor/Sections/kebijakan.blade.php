@extends('dashboard')

@section('title', 'Editor Halaman - Kebijakan Privasi')

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
                    <h5 class="mt-2">Kebijakan Privasi - Bahasa Indonesia</h5>
                </div>
            </div>

            <hr>

            <form id="formPrivacy" action="{{ route('update.privacy', ['bahasa' => 1]) }}" method="post">
                @csrf
                @method('PUT')

                <!-- Judul Halaman -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="judul" class="form-label mt-2 fw-bold">Judul halaman:</label>
                    </div>
                    <div class="col-md">
                        <input type="text" id="judul" name="judul" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Judul'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Kalimat sambutan -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="keterangan" class="form-label mt-2 fw-bold">Kalimat sambutan:</label>
                    </div>
                    <div class="col-md">
                        <input type="text" id="keterangan" name="keterangan" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Keterangan'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Isi halaman -->
                <div class="mb-3">
                    <label for="isi" class="form-label fw-bold">Isi halaman:</label>
                    <textarea id="isi" name="isi" class="editor" rows="5" placeholder="Ketik disini.....">{{ $data['Isi'] ?? '' }}</textarea>
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

            ClassicEditor.create($("#isi")[0]) // jQuery selector perlu dikonversi ke elemen DOM
                .then(newEditor => {
                    editor = newEditor;
                    editor.model.document.on('change:data', () => {
                        formChanged = true;
                    });
                })
                .catch(error => {
                    console.error(error);
                });

            $('#formPrivacy input, #formPrivacy textarea').on('input', function() {
                formChanged = true;
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

            $('#pilihBahasa').focus(function() {
                $(this).data('prev', $(this).val());
            });

            function saveToDatabase() {
                return new Promise((resolve, reject) => {
                    let bahasaSebelumnya = $('#pilihBahasa').data(
                        'prev'); // Ambil ID bahasa sebelum perubahan

                    let formData = {
                        judul: $('#judul').val(),
                        keterangan: $('#keterangan').val(),
                        isi: editor.getData(),
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        _method: 'PUT'
                    };

                    $.ajax({
                        url: "/update_privacy/" + bahasaSebelumnya,
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
                var bahasaId = $('#pilihBahasa').val();
                var form = $('#formPrivacy');

                $('#judulBahasa').text(bahasaText);
                form.attr('action', '/update_privacy/' + bahasaId);

                $.ajax({
                    url: `/editor_halaman/privacy/` + bahasaId,
                    type: "GET",
                    success: function(response) {
                        if (response) {
                            $('#judul').val(response.Judul || '');
                            $('#keterangan').val(response.Keterangan || '');
                            editor.setData(response.Isi || '');
                        } else {
                            $('#judul').val('');
                            $('#keterangan').val('');
                            editor.setData('');
                        }
                        formChanged = false;
                    },
                    error: function() {
                        $('#judul').val('');
                        $('#keterangan').val('');
                        editor.setData('');
                    }
                });
            }
        });
    </script>

@endsection
