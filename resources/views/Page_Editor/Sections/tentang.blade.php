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

            <form id="formTentang" action="{{ route('update.tentang', ['bahasa' => 1]) }}" method="post"
                enctype="multipart/form-data">
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
                            @foreach ($misi as $item)
                                <div class="row mb-2 misi-item">
                                    <div class="col-md">
                                        <input type="text" name="misi_judul[]" class="form-control"
                                            value="{{ $item->judul }}" placeholder="Judul Misi">
                                    </div>
                                    <div class="col-md">
                                        <input type="text" name="misi_keterangan[]" class="form-control"
                                            value="{{ $item->keterangan }}" placeholder="Keterangan Misi">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger hapusMisi"><i
                                                class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                            @endforeach

                            {{-- Kalau belum ada misi sama sekali, munculin 1 form kosong --}}
                            @if ($misi->isEmpty())
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
                            @endif
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
                            @foreach ($kelebihan as $item)
                                <div class="row mb-3 keunggulan-item align-items-center">
                                    <!-- Kolom Input -->
                                    <div class="col-md-11">
                                        <div class="row mb-2">
                                            <div class="col-md">
                                                <input type="file" name="keunggulan_image[]" class="form-control"
                                                    accept="image/*">

                                                @if ($item->ikon)
                                                    <small class="d-block mt-1">
                                                        <img src="{{ asset('storage/' . $item->ikon) }}"
                                                            alt="{{ $item->nama }}" class="img-thumbnail"
                                                            width="80">
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="col-md">
                                                <input type="text" name="keunggulan_judul[]" class="form-control"
                                                    placeholder="Judul Keunggulan" value="{{ $item->judul }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md">
                                                <input type="text" name="keunggulan_keterangan[]" class="form-control"
                                                    placeholder="Keterangan Keunggulan" value="{{ $item->isi }}">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Kolom Button Hapus -->
                                    <div class="col-md-1 text-end">
                                        <button type="button" class="btn btn-danger hapusKeunggulan"><i
                                                class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                            @endforeach
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

            let editorDesc, editorVisi, editorKet;

            ClassicEditor.create($("#editorDesc")[0])
                .then(newEditor => {
                    editorDesc = newEditor;
                    // Optional: editorDesc.setData("data dari database untuk editorDesc");
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor.create($("#isi_visi")[0])
                .then(newEditor => {
                    editorVisi = newEditor;
                    // Optional: editorVisi.setData("data dari database untuk isi_visi");
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor.create($("#keterangan_perusahaan")[0])
                .then(newEditor => {
                    editorKet = newEditor;
                    // Optional: editorKet.setData("data dari database untuk keterangan_perusahaan");
                })
                .catch(error => {
                    console.error(error);
                });

            // Event ganti bahasa
            $('#pilihBahasa').change(function() {
                const bahasaId = $(this).val();
                const form = $('#formTentang');

                console.log("Form action berubah ke: " + form.attr('action'));

                $.ajax({
                    url: '/editor_halaman/tentang/' + bahasaId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        form.attr('action', '/update_tentang/' + bahasaId);

                        const tentang = response.tentang;
                        const misiList = response.misi;
                        const keunggulanList = response.keunggulan;

                        if (tentang) {
                            $('#judul_kecil').val(tentang.judul_pendek || '');
                            $('#judul_halaman').val(tentang.judul_halaman || '');
                            $('#btn_login').val(tentang.btn_login || '');
                            $('#tentang_perusahaan').val(tentang.tentang_perusahaan || '');
                            $('#judul_visi').val(tentang.judul_visi || '');
                            $('#visi_misi').val(tentang.visi_misi || '');
                            $('#judul_ku').val(tentang.judul_ku || '');

                            editorDesc.setData(tentang.deskripsi || '');
                            editorKet.setData(tentang.keterangan_perusahaan || '');
                            editorVisi.setData(tentang.isi_visi || '');
                        } else {
                            kosong();
                        }

                        // 🔥 Render ulang daftar Misi
                        let misiHTML = '';
                        if (misiList.length > 0) {
                            misiList.forEach(function(misi) {
                                misiHTML += `
                    <div class="row mb-2 misi-item">
                        <div class="col-md">
                            <input type="text" name="misi_judul[]" class="form-control" value="${misi.judul}" placeholder="Judul Misi">
                        </div>
                        <div class="col-md">
                            <input type="text" name="misi_keterangan[]" class="form-control" value="${misi.keterangan}" placeholder="Keterangan Misi">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger hapusMisi"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>`;
                            });
                        } else {
                            misiHTML = `
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
                    </div>`;
                        }

                        $('#listMisi').html(misiHTML);

                        // 🔥 Render ulang daftar Keunggulan
                        let keunggulanHTML = '';
                        if (keunggulanList.length > 0) {
                            keunggulanList.forEach(function(item) {
                                keunggulanHTML += `
                    <div class="row mb-3 keunggulan-item align-items-center">
                        <div class="col-md-11">
                            <div class="row mb-2">
                                <div class="col-md">
                                    <input type="file" name="keunggulan_image[]" class="form-control" accept="image/*">
                                    ${item.ikon ? `
                                            <div class="mt-2">
                                                <img src="storage/${item.ikon}" alt="ikon" class="img-thumbnail rounded shadow-sm" style="width: 80px; height: auto;">
                                            </div>
                                        ` : ''}
                                </div>

                                <div class="col-md">
                                    <input type="text" name="keunggulan_judul[]" class="form-control"
                                        placeholder="Judul Keunggulan" value="${item.judul}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <input type="text" name="keunggulan_keterangan[]" class="form-control"
                                        placeholder="Keterangan Keunggulan" value="${item.isi}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-danger hapusKeunggulan"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>`;
                            });
                        } else {
                            keunggulanHTML = `
                    <div class="row mb-3 keunggulan-item align-items-center">
                        <div class="col-md-11">
                            <div class="row mb-2">
                                <div class="col-md">
                                    <input type="file" name="keunggulan_image[]" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="keunggulan_judul[]" class="form-control" placeholder="Judul Keunggulan">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <input type="text" name="keunggulan_keterangan[]" class="form-control" placeholder="Keterangan Keunggulan">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-danger hapusKeunggulan"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>`;
                        }

                        $('#listKeunggulan').html(keunggulanHTML);
                    }
                });

                function kosong() {
                    form.attr('action', '/update_tentang/' + bahasaId);

                    $('#judul_kecil').val('');
                    $('#judul_halaman').val('');
                    $('#btn_login').val('');
                    $('#tentang_perusahaan').val('');
                    $('#judul_visi').val('');
                    $('#visi_misi').val('');
                    $('#judul_ku').val('');

                    editorDesc.setData('');
                    editorKet.setData('');
                    editorVisi.setData('');

                    $('#listMisi').html('');
                    $('#listKeunggulan').html('');
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
