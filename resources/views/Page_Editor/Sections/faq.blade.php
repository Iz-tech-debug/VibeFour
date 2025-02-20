@extends('dashboard')

@section('title', 'Editor Halaman - F.A.Q')

@section('content')

    @include('Modal.Editor.FAQ.detail')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <h4 class="mt-2" style="color:blueviolet;">F.A.Q / Pertanyaan Umum</h4>
        </div>

        <br>

        <div class="card p-4 shadow-sm">

            <div class="row mt-1">
                <div class="col-md-9">
                    <h5 class="mt-2">Tabel Pertanyaan Umum</h5>
                </div>

                <div class="col-md-3 text-end">
                    <a href="/tambah_pertanyaan" class="btn btn-primary">
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
                        <th class="text-center">Nomor</th>
                        <th class="text-center">Pertanyaan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>Bagaimana cara mendaftar akun?</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#detailModal">
                                Detail
                            </button>
                            <a href="/edit_pertanyaan" class="btn btn-success btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm btn-hapus" data-id="1">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>Apa yang dimaksud dengan layanan premium?</td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm">Detail</button>
                            <button class="btn btn-success btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td>Bagaimana cara menghubungi layanan pelanggan?</td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm">Detail</button>
                            <button class="btn btn-success btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                    </tr>
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
                let id = $(this).data('id'); // Ambil ID dari atribut data-id

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
                        // Simulasi penghapusan dengan alert (Gantilah dengan AJAX atau form submit ke backend)
                        Swal.fire(
                            "Terhapus!",
                            "Pertanyaan telah dihapus.",
                            "success"
                        );
                    }
                });
            });
        });
    </script>

@endsection
