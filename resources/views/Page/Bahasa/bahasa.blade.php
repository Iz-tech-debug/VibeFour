@extends('dashboard')

@section('title', 'Manajemen Bahasa')

@section('content')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Manajemen Bahasa</h4>

            <a href="{{ route('page.tambah_bahasa') }}" class="btn btn-success">
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
                        <th class="text-center" style="width: 5%">#</th>
                        <th class="text-center col-md-1">Ikon</th>
                        <th class="text-center col-md-4">Nama Bahasa</th>
                        <th class="text-center" style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bahasa as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>

                            <td class="text-center">
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid mt-1 rounded-circle shadow-sm"
                                    style="width: 25px; height: 25px;"
                                    alt="Gambar Ikon Bahasa {{ $item->nama_bahasa }}" srcset="">
                            </td>

                            <td>{{ $item->nama_bahasa }}</td>

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

    <script>
        $(document).ready(function() {
            // Search
            $('#searchInput').on('keyup', function() {
                var searchValue = $(this).val().toLowerCase();
                $('#tablelang tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1)
                });
            });

            // Hapus bahasa
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
