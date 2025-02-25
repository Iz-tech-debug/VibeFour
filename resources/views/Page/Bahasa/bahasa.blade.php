@extends('dashboard')

@section('title', 'Manajemen Bahasa')

@section('content')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Manajemen Bahasa</h4>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahBahasa">
                <i class="bi bi-plus"></i> Tambah Bahasa
            </button>
        </div>

        <br>

        <div class="card p-4 shadow-sm">
            <div class="text-end mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari bahasa...">
            </div>

            <table id="tablelang" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center col-md-1">#</th>
                        <th class="text-center col-md-2">Ikon</th>
                        <th class="text-center col-md-4">Nama Bahasa</th>
                        <th class="text-center col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bahasa as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>

                            <td>
                                <img src="{{ $item->gambar }}" class="img-fluid"
                                    alt="Gambar Ikon Bahasa {{ $item->nama }}" srcset="">
                            </td>

                            <td>{{ $item->nama }}</td>

                            <td class="text-center">

                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#edtBahasa{{ $item->id }}">
                                    <i class="bi bi-pencil me-2"></i>Edit
                                </button>

                                <button class="btn btn-danger btn-sm btn-hapus" data-id="{{ $item->id }}">
                                    <i class="bi bi-trash me-2"></i>Hapus</button>
                            </td>
                        </tr>

                        @include('Modal.Bahasa.edit ')
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- Modal Tambah Bahasa -->
    <div class="modal fade" id="modalTambahBahasa" tabindex="-1" aria-labelledby="modalTambahBahasaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahBahasaLabel">Tambah Bahasa Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Input Nama Bahasa -->
                        <div class="mb-3">
                            <label for="nama_bahasa" class="form-label">Nama Bahasa</label>
                            <input type="text" class="form-control" id="nama_bahasa" name="nama"
                                placeholder="Contoh: Indonesia" required>
                        </div>

                        <!-- Input Ikon Bahasa -->
                        <div class="mb-3">
                            <label for="ikon_bahasa" class="form-label">Ikon Bahasa</label>
                            <input type="file" class="form-control" id="ikon_bahasa" name="gambar" accept="image/*"
                                required>
                            <small class="text-muted">Format gambar: JPG, PNG, atau JPEG</small>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            // Search
            $('#searchInput').on('keyup', function() {
                var searchValue = $(this).val().toLowerCase();
                $('#tablelang tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1)
                });
            });

            // Hapus
            $(document).on('click', '.btn-hapus', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data ini akan dihapus secara permanen!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/bahasa/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Terhapus!",
                                    text: response.success,
                                    icon: "success",
                                }).then(() => {
                                    // Hapus baris dari tabel setelah klik OK
                                    $('button[data-id="' + id + '"]').closest(
                                        'tr').remove();
                                });
                            },
                            error: function() {
                                Swal.fire("Gagal!",
                                    "Terjadi kesalahan saat menghapus data.",
                                    "error");
                            }
                        });
                    }
                });
            });
        });
    </script>

@endsection
