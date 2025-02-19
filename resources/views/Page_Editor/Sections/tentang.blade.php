@extends('dashboard')

@section('title', 'Editor Halaman - Tentang')

@section('content')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <div class="row">
                <div class="col-md">
                    <h4 class="mt-2" style="color:blueviolet;">Editor Halaman</h4>
                </div>

                <div class="col-md-3 mt-1 text-end">
                    <select class="form-select" aria-label="Pilih Bahasa">
                        <option value="1">Bahasa Indonesia</option>
                        <option value="2">Bahasa Inggris</option>
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

            <form action="#" method="post">
                @csrf

                {{-- Judul Kecil --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="judul_kecil" class="form-label fw-bold">Judul kecil pendek:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul_kecil" name="judul_pendek" class="form-control"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                {{-- Judul Halaman --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="judul_halaman" class="form-label fw-bold">Judul halaman:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul_halaman" name="judul_halaman" class="form-control"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-2">
                        <label for="editorDesc" class="form-label fw-bold">Deskripsi singkat:</label>
                    </div>

                    <div class="col-md">
                        <textarea name="deskripsi" id="editorDesc" class="editor" placeholder="Ketik disini....." required></textarea>
                    </div>
                </div>

                {{-- Teks Tombol Masuk --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="btn_login" class="form-label fw-bold">Teks tombol masuk:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="btn_login" name="btn_login" class="form-control"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                {{-- Visi --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="judul_vm" class="form-label fw-bold">Judul misi & tujuan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul_vm" name="judul_vm" class="form-control"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                <hr>

                {{-- Visi --}}
                <div class="row mb-3 mt-2">
                    <div class="col-md-3 mt-1">
                        <label for="visi" class="form-label fw-bold">Visi perusahaan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="visi" name="visi" class="form-control"
                            placeholder="Ketik disini....." required>
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
                                    <input type="text" name="misi_judul[]" class="form-control" placeholder="Judul Misi"
                                        required>
                                </div>
                                <div class="col-md">
                                    <input type="text" name="misi_keterangan[]" class="form-control"
                                        placeholder="Keterangan Misi" required>
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
                        <label for="judul_ku" class="form-label fw-bold">Judul keunggulan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="judul_ku" name="judul_ku" class="form-control"
                            placeholder="Ketik disini....." required>
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
                                                accept="image/*" required>
                                        </div>
                                        <div class="col-md">
                                            <input type="text" name="keunggulan_judul[]" class="form-control"
                                                placeholder="Judul Keunggulan" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <input type="text" name="keunggulan_keterangan[]" class="form-control"
                                                placeholder="Keterangan Keunggulan" required>
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
                    <button type="button" class="btn btn-primary" id="btnSimpan">
                        <i class="bi bi-save me-1"></i>
                        Simpan
                    </button>
                </div>
            </form>

        </div>

    </div>

    <script>
        $(document).ready(function() {

            // Sweetalert Simpan
            $("#btnSimpan").on("click", function() {
                Swal.fire({
                    title: "Apakah Anda yakin ingin menyimpan ini?",
                    text: "Perubahan akan terjadi di website",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Simpan",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Tersimpan!",
                            text: "Data Anda telah disimpan.",
                            icon: "success"
                        });
                    }
                });
            });

            // Misi Perusahaan
            $("#tambahMisi").on("click", function() {
                let misiHTML = `
                    <div class="row mb-2 misi-item">
                        <div class="col-md">
                            <input type="text" name="misi_judul[]" class="form-control" placeholder="Judul Misi" required>
                        </div>
                        <div class="col-md">
                            <input type="text" name="misi_keterangan[]" class="form-control" placeholder="Keterangan Misi" required>
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
                                    <input type="file" name="keunggulan_image[]" class="form-control" accept="image/*" required>
                                </div>
                                <div class="col-md">
                                    <input type="text" name="keunggulan_judul[]" class="form-control"
                                        placeholder="Judul Keunggulan" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <input type="text" name="keunggulan_keterangan[]" class="form-control"
                                        placeholder="Keterangan Keunggulan" required>
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
