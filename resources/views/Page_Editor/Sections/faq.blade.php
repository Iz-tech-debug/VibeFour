@extends('dashboard')

@section('title', 'Editor Halaman - F.A.Q')

@section('content')

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

    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                let searchValue = $(this).val().toLowerCase();
                $('#myTable tbody tr').each(function() {
                    let cellText = $(this).find('td:eq(1)').text().toLowerCase();
                    $(this).toggle(cellText.includes(searchValue));
                });
            });

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
                            url: `/hapus_pertanyaan/${id}`,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                console.log(
                                    response); // Cek respons dari server di console

                                if (response.success) {
                                    Swal.fire({
                                        title: "Terhapus!",
                                        text: response.success,
                                        icon: "success",
                                    }).then(() => {
                                        $('button[data-id="' + id + '"]')
                                            .closest('tr').remove();
                                    });
                                } else {
                                    Swal.fire("Gagal!", "Respon server tidak sesuai.",
                                        "error");
                                }
                            },
                            error: function(xhr) {
                                console.error(xhr.responseText); // Cek error di console
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
