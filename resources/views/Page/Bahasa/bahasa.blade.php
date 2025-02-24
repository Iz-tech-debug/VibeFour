@extends('dashboard')

@section('title', 'Manajemen Bahasa')

@section('content')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Manajemen Bahasa</h4>

            <a href="" class="btn btn-primary">
                <i class="bi bi-plus"></i> Tambah Bahasa
            </a>
        </div>

        <br>

        <div class="card p-4 shadow-sm">
            <div class="text-end mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari bahasa...">
            </div>

            <table id="tablelang" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Ikon</th>
                        <th class="text-center">Nama Bahasa</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bahasa as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>

                            <td><img src="{{ $item->gambar }}" class="img-fluid"
                                    alt="Gambar Ikon Bahasa {{ $item->nama }}" srcset=""></td>

                            <td>{{ $item->nama }}</td>

                            <td class="text-center">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#detailModal"><i class="bi bi-eye me-1"></i>
                                    Detail
                                </button>

                                <a href="" class="btn btn-success btn-sm"><i class="bi bi-pencil me-2"></i>Edit</a>

                                <button class="btn btn-danger btn-sm btn-hapus" data-id="{{ $item->id }}">
                                    <i class="bi bi-trash me-2"></i>Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
