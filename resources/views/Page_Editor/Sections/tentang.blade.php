@extends('dashboard')

@section('title', 'Editor Halaman - Tentang')

@section('content')

    <style>
        .ck-editor__editable {
            min-height: 250px;
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
                    <h5 class="mt-2">Tentang - Bahasa Indonesia</h5>
                </div>
            </div>

            <hr>

            <form id="formTentang" action="{{ route('update.tentang', ['bahasa' => 1]) }}" method="post">
                @csrf
                @method('put')

                {{-- Judul Kecil --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="judul_kecil" class="form-label fw-bold">Judul kecil pendek:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul_kecil" name="judul_pendek" class="form-control"
                            value="{{ $data['judul_pendek'] ?? '' }}" placeholder="Ketik disini.....">
                    </div>
                </div>

                {{-- Judul Halaman --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="judul_halaman" class="form-label fw-bold">Judul halaman:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul_halaman" name="judul_halaman" class="form-control"
                            value="{{ $data['judul_halaman'] ?? '' }}" placeholder="Ketik disini.....">
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-2">
                        <label for="editorDesc" class="form-label fw-bold">Deskripsi singkat:</label>
                    </div>

                    <div class="col-md">
                        <textarea name="deskripsi" id="editorDesc" class="editor" placeholder="Ketik disini.....">{{ $data['deskripsi'] ?? '' }}</textarea>
                    </div>
                </div>

                {{-- Teks Tombol Masuk --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="btn_login" class="form-label fw-bold">Teks tombol masuk:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="btn_login" name="btn_login" class="form-control"
                            value="{{ $data['btn_login'] ?? '' }}" placeholder="Ketik disini.....">
                    </div>
                </div>

                {{-- Judul tentang perusahaan --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="tentang_perusahaan" class="form-label fw-bold">Judul tentang perusahaan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="tentang_perusahaan" name="tentang_perusahaan" class="form-control"
                            value="{{ $data['tentang_perusahaan'] ?? '' }}" placeholder="Ketik disini.....">
                    </div>
                </div>

                {{-- Keterangan tentang perusahaan --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="keterangan_perusahaan" class="form-label fw-bold">Keterangan tentang perusahaan:</label>
                    </div>

                    <div class="col-md">
                        <textarea type="text" id="keterangan_perusahaan" name="keterangan_perusahaan" class="form-control editor"
                            placeholder="Ketik disini.....">{{ $data['keterangan_perusahaan'] ?? '' }}</textarea>
                    </div>
                </div>

                <hr>

                {{-- Judul visi & misi --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="visi_misi" class="form-label fw-bold">Judul untuk visi & misi:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="visi_misi" name="visi_misi" class="form-control"
                            value="{{ $data['visi_misi'] ?? '' }}" placeholder="Ketik disini.....">
                    </div>
                </div>

                {{-- Judul visi perusahaan --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="judul_visi" class="form-label fw-bold">Judul visi perusahaan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul_visi" name="judul_visi" class="form-control"
                            value="{{ $data['judul_visi'] ?? '' }}" placeholder="Ketik disini.....">
                    </div>
                </div>

                {{-- Isi Visi perusahaan --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="isi_visi" class="form-label fw-bold">Isi visi perusahaan:</label>
                    </div>

                    <div class="col-md">
                        <textarea type="text" id="isi_visi" name="isi_visi" class="form-control" placeholder="Ketik disini.....">{{ $data['isi_visi'] ?? '' }}</textarea>
                    </div>
                </div>

                {{-- Misi --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label class="form-label fw-bold">Misi Perusahaan:</label>
                    </div>
                    <div class="col-md">
                        <button type="button" class="btn btn-success mb-3" id="tambahMisi"><i class="bi bi-plus"></i>
                            Tambah
                            Misi</button>

                        <div id="listMisi">
                            <div class="row mb-2 misi-item">
                                <div class="col-md">
                                    <input type="text" name="misi_judul[]" class="form-control"
                                        placeholder="Judul Misi">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="misi_keterangan[]" class="form-control"
                                        placeholder="Keterangan Misi">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger hapusMisi"><i
                                            class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                {{-- Judul Keunggulan --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="judul_ku" class="form-label fw-bold">Judul keunggulan perusahaan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul_ku" name="judul_ku" class="form-control"
                            value="{{ $data['judul_ku'] ?? '' }}" placeholder="Ketik disini.....">
                    </div>
                </div>

                {{-- Keunggulan --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label class="form-label fw-bold">Keunggulan Perusahaan:</label>
                    </div>

                    <div class="col-md">
                        <button type="button" class="btn btn-success mb-1" id="tambahKeunggulan"><i
                                class="bi bi-plus"></i>
                            Tambah Keunggulan
                        </button>

                        <small class="ms-2"><i class="bi bi-info-circle">Tambahkan ikon dengan rasio 1:1</i></small>

                        <div id="listKeunggulan" class="mt-2">
                            <div class="row mb-3 keunggulan-item align-items-center">
                                <!-- Kolom Input -->
                                <div class="col-md-11">
                                    <div class="row mb-2">
                                        <div class="col-md">
                                            <input type="file" name="keunggulan_image[]" class="form-control"
                                                accept="image/*">
                                        </div>
                                        <div class="col-md">
                                            <input type="text" name="keunggulan_judul[]" class="form-control"
                                                placeholder="Judul Keunggulan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <input type="text" name="keunggulan_keterangan[]" class="form-control"
                                                placeholder="Keterangan Keunggulan">
                                        </div>
                                    </div>
                                </div>

                                <!-- Kolom Button Hapus -->
                                <div class="col-md-1 text-end">
                                    <button type="button" class="btn btn-danger hapusKeunggulan"><i
                                            class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        </div>
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

            ClassicEditor.create($("#editorDesc")[0]) // jQuery selector perlu dikonversi ke elemen DOM
                .then(newEditor => {
                    editor = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor.create($("#isi_visi")[0]) // jQuery selector perlu dikonversi ke elemen DOM
                .then(newEditor => {
                    editor = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor.create($("#keterangan_perusahaan")[0]) // jQuery selector perlu dikonversi ke elemen DOM
                .then(newEditor => {
                    editor = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            $('#pilihBahasa').change(function() {
                var bahasaId = $(this).val();
                var form = $('#formTentang');

                console.log("Form action berubah ke: " + form.attr('action')); // Debugging

                $.ajax({
                    url: '/editor_halaman/tentang/' + bahasaId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {

                        form.attr('action', '/update_tentang/' + bahasaId);

                        if (response) {
                            $('#judul_kecil').val(response.judul_pendek || '');
                            $('#judul_halaman').val(response.judul_halaman || '');
                            $('#deskripsi').val(response.deskripsi || '');
                            $('#btn_login').val(response.btn_login || '');
                            $('#tentang_perusahaan').val(response.tentang_perusahaan || '');
                            $('#keterangan_perusahaan').val(response.keterangan_perusahaan ||
                                '');
                            $('#visi_misi').val(response.visi_misi || '');
                            $('#judul_visi').val(response.judul_visi || '');
                            $('#isi_visi').val(response.isi_visi || '');
                            $('#judul_ku').val(response.judul_ku || '');
                        } else {
                            kosongkanForm();
                        }
                    },
                    error: function(xhr, status, error) {
                        form.attr('action', '/update_tentang/' + bahasaId);
                        console.error("Error:", status, error);
                        kosongkanForm();
                    }
                });

                function kosongkanForm() {
                    form.attr('action', '/update_header/' + bahasaId);
                    $('#judul_kecil, #judul_halaman, #deskripsi, #btn_login, #tentang_perusahaan, #keterangan_perusahaan, #visi_misi, #judul_visi, #isi_visi, #judul_ku').val('');
                }
            });

            // Misi Perusahaan
            $("#tambahMisi").on("click", function() {
                let misiHTML = `
                    <div class="row mb-2 misi-item">
                        <div class="col-md">
                            <input type="text" name="misi_judul[]" class="form-control" placeholder="Judul Misi">
                        </div>
                        <div class="col-md">
                            <input type="text" name="misi_keterangan[]" class="form-control" placeholder="Keterangan Misi">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger hapusMisi"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    `;
                $("#listMisi").append(misiHTML);
            });

            $(document).on("click", ".hapusMisi", function() {
                $(this).closest(".misi-item").remove();
            });

            // Keunggulan
            $("#tambahKeunggulan").click(function() {
                let keunggulanHTML = `
                <hr>
                    <div class="row mb-3 keunggulan-item align-items-center">
                        <!-- Kolom Input -->
                        <div class="col-md-11">
                            <div class="row mb-2">
                                <div class="col-md">
                                    <input type="file" name="keunggulan_image[]" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="keunggulan_judul[]" class="form-control"
                                        placeholder="Judul Keunggulan">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <input type="text" name="keunggulan_keterangan[]" class="form-control"
                                        placeholder="Keterangan Keunggulan">
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Button Hapus -->
                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-danger hapusKeunggulan"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>`;
                $("#listKeunggulan").append(keunggulanHTML);
            });

            $(document).on("click", ".hapusKeunggulan", function() {
                $(this).closest(".keunggulan-item").remove();
            });

        });
    </script>

@endsection
