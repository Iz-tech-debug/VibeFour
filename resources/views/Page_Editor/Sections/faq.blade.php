@extends('dashboard')

@section('title', 'Editor Halaman - F.A.Q')

@section('content')

    <style>
        .ck-editor__editable {
            min-height: 200px;
        }
    </style>

    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <div class="row">
                <div class="col-md">
                    <h4 class="mt-2" style="color:blueviolet;">F.A.Q / Pertanyaan umum</h4>
                </div>

                <div class="col-md-3 mt-1 text-end">
                    <select class="form-select" id="pilihBahasa">
                        @foreach ($bahasa as $item)
                            <option value="{{ $item->id }}">
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
                    <h5 class="mt-2">Tabel Pertanyaan Umum</h5>
                </div>

                <div class="col-md-3 text-end">
                    <a href="{{ route('add_faq.index') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Tambah Pertanyaan
                    </a>
                </div>
            </div>

            <hr>

            <div class="">
                <input type="text" id="searchInput" class="form-control mb-3" placeholder="Cari pertanyaan...">
            </div>

            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 7%;">Nomor</th>
                        <th class="text-center">Pertanyaan & Jawaban</th>
                        <th class="text-center" style="width: 25%;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>

                            <td class="align-middle">
                                <strong>{{ $item->pertanyaan }}</strong>
                            </td>

                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $item->id }}">
                                    <i class="bi bi-info-circle me-2"></i>Detail
                                </button>

                                <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $item->id }}"><i
                                        class="bi bi-pencil me-2"></i>Edit</button>

                                <button class="btn btn-danger btn-sm btn-hapus" data-id="{{ $item->id }}"><i
                                        class="bi bi-trash me-2"></i>Hapus</button>
                            </td>
                        </tr>
                        @include('Modal.Editor.FAQ.detail')
                        @include('Modal.Editor.FAQ.edit')
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <!-- Modal Edit FAQ -->
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
        aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form action="{{ route('faq.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">
                            <i class="bi bi-pencil-square me-2"></i>Edit Pertanyaan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="pertanyaan{{ $item->id }}" class="form-label">Pertanyaan</label>
                            <input type="text" name="pertanyaan" class="form-control" id="pertanyaan{{ $item->id }}"
                                value="{{ $item->pertanyaan }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="jawaban{{ $item->id }}" class="form-label">Jawaban</label>
                            <textarea name="jawaban" class="form-control editor" id="jawaban{{ $item->id }}" rows="5" required>{{ $item->jawaban }}</textarea>
                        </div>

                        <input type="hidden" name="bahasa_id" value="{{ $item->bahasa_id }}"> {{-- kalau ada relasi bahasa --}}

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-check-circle me-2"></i>Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script>
        let editors = {}; // buat nyimpan semua instance CKEditor

        // Bikin function inisialisasi ulang CKEditor
        function initCKEditor() {
            document.querySelectorAll('.editor').forEach((textarea) => {
                const id = textarea.id;

                // Cek biar gak double init
                if (!editors[id]) {
                    ClassicEditor
                        .create(textarea)
                        .then(editor => {
                            editors[id] = editor;
                        })
                        .catch(error => {
                            console.error(`CKEditor error on #${id}`, error);
                        });
                }
            });
        }

        // Inisialisasi saat pertama kali DOM ready
        $(document).ready(function() {
            initCKEditor();

            // Inisialisasi ulang CKEditor saat modal dibuka
            $('.modal').on('shown.bs.modal', function() {
                initCKEditor();
            });
        });
    </script>


@endsection
