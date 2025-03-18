@extends('dashboard')

@section('title', 'Manajemen Berita')

@section('content')

    <div class="container mt-4">

        <!-- Header -->
        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Manajemen Berita</h4>

            <a href="{{ route('page.tambah_berita') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i> Tambah Berita
            </a>
        </div>

        <br>

        <!-- Daftar Berita -->
        @foreach ($data as $item)
            <div class="card p-4 shadow-sm mb-3">
                <div class="row align-items-center">
                    <!-- Gambar -->
                    <div class="col-md-2 text-center">
                        <div class="border rounded d-flex align-items-center justify-content-center"
                            style="width: 100px; height: 100px; border: 2px solid blue; overflow: hidden;">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Berita"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>

                    <!-- Judul Berita -->
                    <div class="col-md-6 text-start">
                        <h6 class="">{{ $item->judul }}</h6>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="col-md-4 text-end">
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
            $(".btn-hapus-berita").click(function() {
                let beritaId = $(this).data("id");
                let token = "{{ csrf_token() }}";

                Swal.fire({
                    title: "Apakah kamu yakin?",
                    text: "Data berita yang dihapus tidak bisa dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/berita/" + beritaId,
                            type: "DELETE",
                            data: {
                                _token: token
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Terhapus!",
                                    text: response.message,
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                setTimeout(() => {
                                    location.reload();
                                }, 2000);
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    title: "Gagal!",
                                    text: "Berita tidak bisa dihapus, coba lagi.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>

@endsection
