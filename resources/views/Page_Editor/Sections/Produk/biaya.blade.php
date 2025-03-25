@extends('dashboard')

@section('title', 'Editor Halaman - Biaya / Paket berlangganan')

@section('content')

    <div class="container mt-4">
        <div class="card p-3 shadow-sm">
            <div class="row">
                <div class="col-md-9">
                    <h4 class="mt-2" style="color:blueviolet;">Biaya / Paket berlangganan</h4>
                </div>

                <div class="col-md text-end">
                    <select class="form-select" id="pilihBahasa" aria-label="Pilih Bahasa">
                        @foreach ($lang as $item)
                            <option value="{{ $item->id }}"}}>
                                Bahasa {{ $item->nama_bahasa }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        <div class="card p-4 mt-4 shadow-sm">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mt-2 ms-2">Paket Berlangganan</h5>
                </div>

                <div class="col-md-6">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="/tambah_paket" class="btn btn-primary">Tambah paket</a>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th style="width: 5%;">Nomor</th>
                        <th>Nama Paket</th>
                        <th style="width: 25%; white-space: nowrap;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($paket as $item)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>

                            <td class="align-middle">{{ $item->nama }}</td>

                            <td class="text-center align-middle" style="white-space: nowrap;">
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detailPaket{{ $item->id }}">
                                    <i class="bi bi-info-circle me-2"></i>Detail
                                </button>

                                <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#editPaket{{ $item->id }}">
                                    <i class="bi bi-pencil me-2"></i>Edit
                                </button>

                                <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $item->id }}"
                                    data-nama="{{ $item->nama }}">
                                    <i class="bi bi-trash me-2"></i>Hapus
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <br>

    </div>

    @foreach ($paket as $item)
        <div class="modal fade" id="detailPaket{{ $item->id }}" tabindex="-1"
            aria-labelledby="detailPaket{{ $item->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailPaket{{ $item->id }}Label">Detail Paket: {{ $item->nama }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Nama Paket:</strong> {{ $item->nama }}</p>
                        <p><strong>Harga:</strong> Rp {{ $item->harga }} </p>
                        <p><strong>Masa Langganan:</strong> {{ $item->durasi }} {{ $item->satuan_waktu }}</p>
                        <p><strong>Fitur:</strong></p>
                        <ul>
                            @foreach ($item->features as $feature)
                                <li>{{ $feature->fitur }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($paket as $item)
        <div class="modal fade" id="editPaket{{ $item->id }}" tabindex="-1"
            aria-labelledby="editPaket{{ $item->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPaket{{ $item->id }}Label">Edit Paket: {{ $item->nama }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('update.paket', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Paket</label>
                                <input type="text" class="form-control" name="nama_paket" value="{{ $item->nama }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control" name="harga" value="{{ $item->harga }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Durasi Langganan</label>
                                <input type="number" class="form-control" name="durasi" value="{{ $item->durasi }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Satuan Waktu</label>
                                <input type="text" class="form-control" name="periode" id="periode"
                                    value="{{ $item->satuan_waktu }}" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    <script>
        $(document).ready(function() {
            $(".btn-hapus").click(function() {
                var paketId = $(this).data("id");
                var paketNama = $(this).data("nama");

                Swal.fire({
                    title: "Hapus Paket?",
                    text: `Apakah Anda yakin ingin menghapus paket "${paketNama}"?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/hapus_paket/" + paketId,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Paket berhasil dihapus.",
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false
                                }).then(() => {
                                    location
                                .reload(); // Reload halaman setelah sukses
                                });
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
