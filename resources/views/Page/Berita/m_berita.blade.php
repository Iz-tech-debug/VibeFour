@extends('dashboard')

@section('title', 'Manajemen Berita')

@section('content')

    <div class="container mt-4">

        <!-- Header -->
        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Manajemen Berita</h4>

            <div class="d-flex align-items-center gap-3">
                <!-- Search -->
                <input type="text" id="searchBerita" class="form-control" placeholder="Cari berita..."
                    style="max-width: 250px;">

                <!-- Filter Bahasa -->
                <select id="filterBahasa" class="form-select" style="max-width: 200px;">
                    <option value=""><--Pilih Bahasa--></option>
                    @foreach ($bahasa as $b)
                        <option value="{{ $b->id }}">{{ $b->nama_bahasa }}</option>
                    @endforeach
                </select>

                <!-- Tambah Berita -->
                <a href="{{ route('page.tambah_berita') }}" class="btn btn-primary" style="min-width: 180px;">
                    <i class="bi bi-plus"></i> Tambah Berita
                </a>
            </div>
        </div>

        <br>

        <!-- Daftar Berita -->
        @foreach ($data as $item)
            <div class="card p-4 shadow-sm mb-3">
                <div class="row align-items-center">
                    <!-- Gambar -->
                    <div class="col-md-1 text-center">
                        <div class="border rounded d-flex align-items-center justify-content-center"
                            style="width: 100px; height: 100px; border: 2px solid blue; overflow: hidden;">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Berita"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>

                    <!-- Judul Berita -->
                    <div class="col mt-2 ms-5 text-start">
                        <h6 class="">{{ $item->judul }}</h6>
                    </div>

                    <!-- Tombol Aksi & Bahasa -->
                    <div class="col-md-4 ms-5 mb-2 text-end">
                        <!-- Tampilkan Nama Bahasa -->
                        <p class="text-muted mb-4">
                            <i class="bi bi-translate"></i> {{ $item->bahasa->nama_bahasa ?? 'Tidak Diketahui' }}
                        </p>

                        <button class="btn btn-danger btn-sm btn-hapus-berita" data-id="{{ $item->id }}">
                            <i class="bi bi-trash me-2"></i>Hapus Berita
                        </button>

                        <a href="/edit_berita/{{ $item->id }}" class="btn btn-success btn-sm">
                            <i class="bi bi-pencil me-2"></i>Edit Berita
                        </a>
                    </div>

                </div>
            </div>
        @endforeach


    </div>

    <script>
        $(document).ready(function() {
            // SEARCH BERITA
            $("#searchBerita").on("keyup", function() {
                var searchText = $(this).val().toLowerCase();
                $("#tableBerita tr").each(function() {
                    var nama = $(this).data("nama");
                    $(this).toggle(nama.includes(searchText));
                });
            });

            // FILTER BAHASA
            $("#filterBahasa").on("change", function() {
                var filterValue = $(this).val();
                $("#tableBerita tr").each(function() {
                    var bahasa = $(this).data("bahasa");
                    $(this).toggle(filterValue === "" || bahasa == filterValue);
                });
            });

            // DELETE DENGAN SWEETALERT
            $(".btn-hapus").click(function() {
                var beritaId = $(this).data("id");
                var beritaNama = $(this).data("nama");

                Swal.fire({
                    title: "Hapus Berita?",
                    text: `Apakah Anda yakin ingin menghapus berita "${beritaNama}"?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/hapus_berita/" + beritaId,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function() {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Berita berhasil dihapus.",
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false
                                }).then(() => location.reload());
                            },
                            error: function() {
                                Swal.fire("Oops!", "Terjadi kesalahan saat menghapus.",
                                    "error");
                            }
                        });
                    }
                });
            });
        });
    </script>

@endsection
