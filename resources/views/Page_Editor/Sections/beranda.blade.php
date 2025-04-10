@extends('dashboard')

@section('title', 'Editor Halaman - Beranda')

@section('content')

    {{-- START CSS --}}
    <style>
        .image-preview {
            margin-top: 10px;
            max-width: 150px;
            max-height: 150px;
            border: 1px solid #ddd;
            border-radius: 8px;
            object-fit: cover;
        }

        .ck-editor__editable {
            min-height: 200px;
        }
    </style>

    {{-- END CSS --}}

    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <div class="row">
                <div class="col-md">
                    <h4 class="mt-2" style="color:blueviolet;">Editor Halaman</h4>
                </div>

                <div class="col-md-3 mt-1 text-end">
                    <select class="form-select" aria-label="Pilih Bahasa" id="pilihBahasa">
                        @foreach ($bahasa as $item)
                            <option value="{{ $item->id }}">Bahasa {{ $item->nama_bahasa }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>

        <br>

        <div class="card p-4 shadow-sm">

            <div class="row mb-2">
                <h5 class="mt-2">Beranda</h5>
            </div>

            <hr>

            <form id="formBeranda" action="{{ route('update.beranda', ['bahasaId' => 1]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <!-- Judul Halaman -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="slogan" class="form-label mt-2 fw-bold">Slogan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="slogan" name="Slogan" value="{{ $data['Slogan'] }}"
                            class="form-control" placeholder="Ketik disini.....">
                    </div>
                </div>

                <!-- Keterangan Aplikasi / Slogan -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="keterangan" class="form-label mt-2 fw-bold">Keterangan singkat:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="keterangan" name="Keterangan" value="{{ $data['Keterangan'] }}"
                            class="form-control" placeholder="Ketik disini.....">
                    </div>
                </div>

                <!-- Button masuk -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="btn_masuk" class="form-label mt-2 fw-bold">Teks button masuk:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="btn_masuk" name="btn_masuk" value="{{ $data['btn_masuk'] }}"
                            class="form-control" placeholder="Ketik disini.....">
                    </div>
                </div>

                <!-- Foto Produk -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-2">
                        <label class="form-label fw-bold">Foto produk:</label>
                    </div>

                    <div class="col-md">

                        <input type="file" name="foto_produk" class="form-control" id="imageAplikasi" accept="image/*">
                        <div class="row">
                            <div class="col">
                                {{-- Tampilkan gambar yang sudah tersimpan di database --}}
                                @if (!empty($produk->gambar))
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Foto Produk"
                                            class="img-thumbnail" width="150">
                                    </div>
                                @endif

                            </div>
                            <div class="col mt-2 text-end">
                                <i class="bi bi-info-circle"></i>
                                <small class="text-muted">Tambahkan gambar dengan rasio 4:3</small>
                            </div>
                        </div>

                    </div>
                </div>

                <hr>

                <!-- Judul Keunggulan -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="keunggulan_produk" class="form-label mt-2 fw-bold">Judul keunggulan produk:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="keunggulan_produk" name="keunggulan_produk"
                            value="{{ $data['keunggulan_produk'] }}" class="form-control" placeholder="Ketik disini.....">
                    </div>
                </div>

                <!-- Keterangan keunggulan -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="keterangan_keunggulan" class="form-label mt-2 fw-bold">Keterangan keunggulan:</label>
                    </div>

                    <div class="col-md">
                        <textarea name="keterangan_keunggulan" class="form-control editor" placeholder="Ketik disini....."
                            id="keterangan_keunggulan">{{ $data['keterangan_keunggulan'] }}</textarea>
                    </div>
                </div>

                <hr>

                {{-- Keunggulan --}}
                <div class="row mt-2">
                    <div class="col-md-3">
                        <label class="form-label fw-bold mt-2">Keunggulan:</label>
                    </div>

                    <div class="col-md">
                        <button type="button" class="btn btn-success mb-1" id="tambahKeunggulan">
                            <i class="bi bi-plus"></i> Tambah Keunggulan
                        </button>
                        <small class="ms-2"><i class="bi bi-info-circle">Tambahkan foto dengan rasio 4:3</i></small>
                    </div>

                    <div id="listKeunggulan" class="mt-2">
                        @if (count($keunggulan) > 0)
                            @foreach ($keunggulan as $item)
                                <div class="row mb-3 pencapaian-item align-items-center">
                                    <div class="col-md-11">
                                        <div class="row mb-2">
                                            <div class="col-md">
                                                <input type="file" name="keunggulan_image[]" class="form-control"
                                                    accept="image/*">
                                                @if ($item->ikon)
                                                    <img src="{{ asset('storage/' . $item->ikon) }}" alt="ikon"
                                                        class="img-thumbnail mt-2" width="80">
                                                @endif
                                            </div>
                                            <div class="col-md">
                                                <input type="text" name="judul_keunggulan[]" class="form-control"
                                                    placeholder="Judul keunggulan" value="{{ $item->judul }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md">
                                                <input type="text" name="Keterangan_keunggulan[]" class="form-control"
                                                    placeholder="Keterangan keunggulan" value="{{ $item->isi }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1 text-end">
                                        <button type="button" class="btn btn-danger hapusKeunggulan"><i
                                                class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            {{-- Kalau gak ada data, tampilkan satu form kosong --}}
                            <div class="row mb-3 pencapaian-item align-items-center">
                                <div class="col-md-11">
                                    <div class="row mb-2">
                                        <div class="col-md">
                                            <input type="file" name="keunggulan_image[]" class="form-control"
                                                accept="image/*">
                                        </div>
                                        <div class="col-md">
                                            <input type="text" name="judul_keunggulan[]" class="form-control"
                                                placeholder="Judul keunggulan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <input type="text" name="Keterangan_keunggulan[]" class="form-control"
                                                placeholder="Keterangan keunggulan">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-1 text-end">
                                    <button type="button" class="btn btn-danger hapusKeunggulan"><i
                                            class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>


                <hr>

                <!-- Judul pencapaian -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="judul_pencapaian" class="form-label mt-2 fw-bold">Judul pencapaian:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul_pencapaian" name="judul_pencapaian"
                            value="{{ $data['judul_pencapaian'] }}" class="form-control"
                            placeholder="Ketik disini.....">
                    </div>
                </div>

                <!-- Deskripsi pencapaian -->
                <div class="row mb-4">
                    <div class="col-md-3 mt-2">
                        <label for="editorDesk" class="form-label fw-bold">Deskripsi pencapaian:</label>
                    </div>

                    <div class="col-md">
                        <textarea id="editorDesk" class="editor" name="deskripsiPencapaian" placeholder="Ketik disini.....">
                            {{ $data['deskripsiPencapaian'] }}
                        </textarea>
                    </div>
                </div>

                <hr>

                <!-- Pencapaian -->
                <div class="row mt-2">

                    <div class="col-md-3">
                        <label class="form-label fw-bold mt-2">Pencapaian:</label>
                    </div>

                    <div class="col-md">
                        <button type="button" class="btn btn-success mb-1" id="tambahPencapaian">
                            <i class="bi bi-plus"></i> Tambah Pencapaian
                        </button>

                        <small class="ms-2"><i class="bi bi-info-circle">Tambahkan ikon dengan rasio 1:1</i></small>
                    </div>

                    <div id="listPencapaian" class="mt-2">
                        @forelse ($achievements as $index => $ach)
                            <div class="row mb-3 pencapaian-item align-items-center">
                                <!-- Kolom Input -->
                                <div class="col-md-11">
                                    <input type="hidden" name="pencapaian_id[]" value="{{ $ach->id }}">

                                    <div class="row mb-2">
                                        <div class="col-md">
                                            <input type="file" name="pencapaian_image[]" class="form-control"
                                                accept="image/*">
                                            @if ($ach->ikon)
                                                <img src="{{ asset('storage/' . $ach->ikon) }}" alt="ikon"
                                                    class="img-thumbnail mt-2" width="80">
                                            @endif
                                        </div>
                                        <div class="col-md">
                                            <input type="text" name="pencapaian_judul[]" class="form-control"
                                                placeholder="Judul Pencapaian" value="{{ $ach->nama }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <input type="text" name="pencapaian_keterangan[]" class="form-control"
                                                placeholder="Keterangan Pencapaian" value="{{ $ach->isi }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Kolom Button Hapus -->
                                <div class="col-md-1 text-end">
                                    <button type="button" class="btn btn-danger hapusPencapaian"><i
                                            class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        @empty
                            <div class="row mb-3 pencapaian-item align-items-center">
                                <div class="col-md-11">
                                    <div class="row mb-2">
                                        <div class="col-md">
                                            <input type="file" name="pencapaian_image[]" class="form-control"
                                                accept="image/*">
                                        </div>
                                        <div class="col-md">
                                            <input type="text" name="pencapaian_judul[]" class="form-control"
                                                placeholder="Judul Pencapaian">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <input type="text" name="pencapaian_keterangan[]" class="form-control"
                                                placeholder="Keterangan Pencapaian">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 text-end">
                                    <button type="button" class="btn btn-danger hapusPencapaian"><i
                                            class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        @endforelse
                    </div>

                </div>



                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>

    </div>

    <script>
        $(document).ready(function() {

            let editorKeterangan, editorDesc;

            ClassicEditor.create($("#editorDesk")[0])
                .then(newEditor => {
                    editorDesc = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor.create($("#keterangan_keunggulan")[0])
                .then(newEditor => {
                    editorKeterangan = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            // Switch bahasa
            $('#pilihBahasa').change(function() {
                var bahasaId = $(this).val();
                var form = $('#formBeranda');

                $.ajax({
                    url: '/editor_halaman/beranda/' + bahasaId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        form.attr('action', '/update_beranda/' + bahasaId);

                        if (response && response.beranda) {
                            const data = response.beranda;

                            $('#slogan').val(data.Slogan || '');
                            $('#keterangan').val(data.Keterangan || '');
                            $('#btn_masuk').val(data.btn_masuk || '');
                            $('#keunggulan_produk').val(data.keunggulan_produk || '');
                            $('#judul_pencapaian').val(data.judul_pencapaian || '');

                            editorKeterangan.setData(data.keterangan_keunggulan || '');
                            editorDesc.setData(data.deskripsiPencapaian || '');

                            // Render ulang bagian keunggulan
                            const listKeunggulan = $('#listKeunggulan');
                            listKeunggulan.empty(); // Kosongkan dulu

                            if (response.keunggulan && response.keunggulan.length > 0) {
                                response.keunggulan.forEach(function(item) {
                                    let html = `
                    <div class="row mb-3 pencapaian-item align-items-center">
                        <div class="col-md-11">
                            <div class="row mb-2">
                                <div class="col-md">
                                    <input type="hidden" name="keunggulan_id[]" value="${item.id || ''}">
                                    <input type="file" name="keunggulan_image[]" class="form-control" accept="image/*">
                                    ${item.ikon ? `<img src="/storage/${item.ikon}" alt="ikon" class="mt-2" width="60">` : ''}
                                </div>
                                <div class="col-md">
                                    <input type="text" name="judul_keunggulan[]" class="form-control" placeholder="Judul keunggulan" value="${item.judul}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <input type="text" name="Keterangan_keunggulan[]" class="form-control" placeholder="Keterangan keunggulan" value="${item.isi}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-danger hapusKeunggulan"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                `;
                                    listKeunggulan.append(html);
                                });
                            } else {
                                listKeunggulan.append(`
                <div class="row mb-3 pencapaian-item align-items-center">
                    <div class="col-md-11">
                        <div class="row mb-2">
                            <div class="col-md">
                                <input type="file" name="keunggulan_image[]" class="form-control" accept="image/*">
                            </div>
                            <div class="col-md">
                                <input type="text" name="judul_keunggulan[]" class="form-control" placeholder="Judul keunggulan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <input type="text" name="Keterangan_keunggulan[]" class="form-control" placeholder="Keterangan keunggulan">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 text-end">
                        <button type="button" class="btn btn-danger hapusKeunggulan"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            `);
                            }

                        } else {
                            kosongkanForm();
                        }
                    },

                    error: function(xhr, status, error) {
                        form.attr('action', '/update_beranda/' + bahasaId);
                        console.error("Error:", status, error);
                        kosongkanForm();
                    }
                });

                function kosongkanForm() {
                    form.attr('action', '/update_beranda/' + bahasaId);

                    $('#slogan').val('');
                    $('#keterangan').val('');
                    $('#btn_masuk').val('');
                    $('#keunggulan_produk').val('');
                    $('#judul_pencapaian').val('');

                    editorKeterangan.setData('');
                    editorDesc.setData('');
                }

            });

            // Tambah Pencapaian
            $("#tambahPencapaian").click(function() {
                let pencapaianHTML = `
                    <hr>
                    <div class="row mb-3 pencapaian-item align-items-center">
                        <!-- Kolom Input -->
                        <div class="col-md-11">
                            <div class="row mb-2">
                                <div class="col-md">
                                    <input type="file" name="pencapaian_image[]" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="pencapaian_judul[]" class="form-control"
                                        placeholder="Judul Pencapaian">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <input type="text" name="pencapaian_keterangan[]" class="form-control"
                                        placeholder="Keterangan Pencapaian">
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Button Hapus -->
                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-danger hapusPencapaian"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>`;

                $("#listPencapaian").append(pencapaianHTML);
            });

            // Tambah Keunggulan
            $("#tambahKeunggulan").click(function() {
                let keunggulanHTML = `
                    <div class="row mb-3 pencapaian-item align-items-center">
                        <div class="col-md-11">
                            <div class="row mb-2">
                                <div class="col-md">
                                    <input type="file" name="keunggulan_image[]" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md">
                                    <input type="text" name="judul_keunggulan[]" class="form-control" placeholder="Judul keunggulan">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <input type="text" name="Keterangan_keunggulan[]" class="form-control" placeholder="Keterangan keunggulan">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-danger hapusKeunggulan"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                `;
                $("#listKeunggulan").append(keunggulanHTML);
            });


            // Hapus Pencapaian
            $(document).on("click", ".hapusPencapaian", function() {
                $(this).closest(".pencapaian-item").remove();
            });
        });
    </script>
@endsection
