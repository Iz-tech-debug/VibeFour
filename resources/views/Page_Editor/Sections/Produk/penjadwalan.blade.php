@extends('dashboard')

@section('title', 'Editor Halaman - Penjadwalan')

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
                        @foreach ($lang as $item)
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
                    <h5 class="mt-2">Penjadwalan</h5>
                </div>
            </div>

            <hr>

            <form id="formPenjadwalan" action="{{ route('update.penjadwalan', ['bahasa' => 1]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <!-- Judul Halaman -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="judul" class="form-label mt-2 fw-bold">Judul halaman:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul" name="Judul" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Judul'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Deskripsi Halaman -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="deskripsiEditor" class="form-label mt-2 fw-bold">Deskripsi halaman:</label>
                    </div>

                    <div class="col-md">
                        <textarea type="text" id="deskripsiEditor" name="Deskripsi" class="editor" placeholder="Ketik disini.....">{{ $data['Deskripsi'] ?? '' }}</textarea>
                    </div>
                </div>

                <!-- Button Coba -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="teks_btncoba" class="form-label mt-2 fw-bold">Teks button coba:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="teks_btncoba" name="TeksButtonCoba" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['TeksButtonCoba'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Button Tutorial -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="teks_btntutor" class="form-label mt-2 fw-bold">Teks button tutorial:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="teks_btntutor" name="TeksButtonTutorial" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['TeksButtonTutorial'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Video Tutorial Voting -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="video_tutor" class="form-label mt-2 fw-bold">Link video tutorial:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="video_tutor" name="Link" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['Link'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Foto Produk -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="foto_produk" class="form-label mt-2 fw-bold">Foto produk:</label>
                    </div>

                    <div class="col-md">
                        <input type="file" id="foto_produk" name="foto_produk" class="form-control" accept="image/*">
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

                <!-- Judul bagaian keunggulan -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="bag_keunggulan" class="form-label mt-2 fw-bold">Judul bagian keunggulan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="bag_keunggulan" name="JudulBagianKeunggulan" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['JudulBagianKeunggulan'] ?? '' }}" required>
                    </div>
                </div>

                <!-- Keterangan singkat keunggulan -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="ket_keunggulan" class="form-label mt-2 fw-bold">Keterangan singkat keunggulan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="ket_keunggulan" name="KeteranganBagianKeunggulan" class="form-control"
                            placeholder="Ketik disini....." value="{{ $data['KeteranganBagianKeunggulan'] ?? '' }}"
                            required>
                    </div>
                </div>

                {{-- Keunggulan --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label class="form-label fw-bold">Keunggulan produk:</label>
                    </div>

                    <div class="col-md">
                        <button type="button" class="btn btn-success mb-1" id="tambahKeunggulanV"><i
                                class="bi bi-plus"></i>
                            Tambah Keunggulan
                        </button>

                        <small class="ms-2"><i class="bi bi-info-circle">Tambahkan ikon dengan rasio 1:1</i></small>

                        <hr>

                        <div id="listKeunggulanVote" class="mt-2">
                            @foreach ($advantages as $adv)
                                <div class="row mb-3 keunggulanV-item align-items-center">
                                    <!-- Kolom Input -->
                                    <div class="col-md-11">
                                        <div class="row mb-2">
                                            <div class="col-md">
                                                <input type="file" name="keunggulanV_image[]" class="form-control"
                                                    accept="image/*">
                                                @if ($adv->ikon)
                                                    <small class="d-block mt-1">
                                                        <img src="{{ asset('storage/' . $adv->ikon) }}"
                                                            alt="{{ $adv->nama }}" class="img-thumbnail"
                                                            width="80">
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="col-md">
                                                <input type="text" name="keunggulanV_judul[]" class="form-control"
                                                    placeholder="Judul Keunggulan" value="{{ $adv->nama }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md">
                                                <input type="text" name="keunggulanV_keterangan[]"
                                                    class="form-control" placeholder="Keterangan Keunggulan"
                                                    value="{{ $adv->isi }}">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Kolom Button Hapus -->
                                    <div class="col-md-1 text-end">
                                        <button type="button" class="btn btn-danger hapusKeunggulanV"
                                            data-id="{{ $adv->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>

                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Button Save -->
                <div class="row">
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>

            </form>

        </div>

    </div>

    <script>
        // Hapus Keunggulan AJAX
        $(document).on('click', '.hapusKeunggulanV', function() {
            const button = $(this);
            const id = button.data('id');

            Swal.fire({
                title: 'Yakin mau hapus?',
                text: "Data keunggulan ini bakal hilang selamanya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('hapus.keunggulan') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id
                        },
                        success: function(res) {
                            if (res.status === 'success') {
                                Swal.fire('Berhasil!', res.message, 'success');
                                button.closest('.keunggulanV-item')
                            .remove(); // hapus element di UI
                            } else {
                                Swal.fire('Gagal!', res.message, 'error');
                            }
                        },
                        error: function() {
                            Swal.fire('Oops!', 'Terjadi kesalahan saat menghapus.', 'error');
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            let editor;

            // Inisialisasi ClassicEditor (CKEditor)
            ClassicEditor.create($("#deskripsiEditor")[0])
                .then(newEditor => {
                    editor = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            $('#pilihBahasa').change(function(e) {
                e.preventDefault(); // cegah langsung berubah

                var bahasaId = $(this).val();
                var form = $('#formPenjadwalan');

                Swal.fire({
                    title: 'Ganti Bahasa?',
                    text: "Apakah kamu ingin menyimpan perubahan sebelum mengganti bahasa?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit form dulu buat nyimpen
                        form.submit();
                    } else {
                        // Jalanin AJAX buat ganti bahasa
                        jalankanAjaxGantiBahasa(bahasaId, form);
                    }
                });
            });

            function jalankanAjaxGantiBahasa(bahasaId, form) {
                $.ajax({
                    url: '/editor_halaman/penjadwalan/' + bahasaId,
                    type: 'GET',
                    success: function(response) {
                        form.attr('action', '/update_penjadwalan/' + bahasaId);

                        if (response) {
                            $('#judul').val(response.Judul || '');
                            editor.setData(response.Deskripsi || '');
                            $('#teks_btncoba').val(response.TeksButtonCoba || '');
                            $('#teks_btntutor').val(response.TeksButtonTutorial || '');
                            $('#video_tutor').val(response.Link || '');
                            $('#bag_keunggulan').val(response.JudulBagianKeunggulan || '');
                            $('#ket_keunggulan').val(response.KeteranganBagianKeunggulan || '');

                            let keunggulanHTML = '';
                            if (response.keunggulan.length > 0) {
                                response.keunggulan.forEach(function(adv) {
                                    keunggulanHTML += `
                        <div class="row mb-3 keunggulanV-item align-items-center">
                            <div class="col-md-11">
                                <div class="row mb-2">
                                    <div class="col-md">
                                        <input type="file" name="keunggulanV_image[]" class="form-control" accept="image/*">
                                        ${adv.ikon ? `<small class="d-block mt-1"><img src="/storage/${adv.ikon}" class="img-thumbnail" width="80"></small>` : ''}
                                    </div>
                                    <div class="col-md">
                                        <input type="text" name="keunggulanV_judul[]" class="form-control" placeholder="Judul Keunggulan" value="${adv.nama}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <input type="text" name="keunggulanV_keterangan[]" class="form-control" placeholder="Keterangan Keunggulan" value="${adv.isi}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 text-end">
                                <button type="button" class="btn btn-danger hapusKeunggulanV"><i class="bi bi-trash"></i></button>
                            </div>
                        </div>
                        <hr>`;
                                });
                            } else {
                                keunggulanHTML =
                                    `<p class="text-muted">Tidak ada keunggulan tersedia.</p>`;
                            }

                            $('#listKeunggulanVote').html(keunggulanHTML);
                        } else {
                            resetFormDanKeunggulan(form, bahasaId);
                        }
                    },
                    error: function() {
                        resetFormDanKeunggulan(form, bahasaId);
                    }
                });
            }



            function resetFormDanKeunggulan(form, bahasaId) {
                form.attr('action', '/update_penjadwalan/' + bahasaId);
                $('#judul').val('');
                editor.setData('');
                $('#teks_btncoba').val('');
                $('#teks_btntutor').val('');
                $('#video_tutor').val('');
                $('#bag_keunggulan').val('');
                $('#ket_keunggulan').val('');
                $('#listKeunggulanVote').html('<p class="text-muted">Tidak ada keunggulan tersedia.</p>');
            }

            // Tambah inputan keunggulan
            $('#tambahKeunggulanV').click(function() {
                var keunggulanBaru = `
            <div class="row mb-3 keunggulanV-item align-items-center">
                <div class="col-md-11">
                    <div class="row mb-2">
                        <div class="col-md">
                            <input type="file" name="keunggulanV_image[]" class="form-control" accept="image/*" required>
                        </div>
                        <div class="col-md">
                            <input type="text" name="keunggulanV_judul[]" class="form-control" placeholder="Judul Keunggulan" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <input type="text" name="keunggulanV_keterangan[]" class="form-control" placeholder="Keterangan Keunggulan" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 text-end">
                    <button type="button" class="btn btn-danger hapusKeunggulanV"><i class="bi bi-trash"></i></button>
                </div>
            </div>`;
                $('#listKeunggulanVote').append(keunggulanBaru);
            });

            // Hapus keunggulan yang ditambahkan
            $(document).on('click', '.hapusKeunggulanV', function() {
                $(this).closest('.keunggulanV-item').remove();
            });

            // Preview nama file yang dipilih
            $(document).on('change', 'input[type="file"]', function() {
                var fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        });
    </script>

@endsection
