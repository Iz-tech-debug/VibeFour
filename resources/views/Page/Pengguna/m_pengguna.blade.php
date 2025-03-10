@extends('dashboard')

@section('title', 'Manajemen Pengguna')

@section('content')

    <div class="container mt-4">
        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Manajemen Pengguna</h4>

            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addPengguna">
                <i class="bi bi-plus"></i> Tambah Pengguna
            </button>
        </div>

        <br>

        <div class="card p-4 shadow-sm">
            <div class="text-end mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari pengguna...">
            </div>

            <table id="tablelang" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center col-md-1">Nomor</th>
                        <th class="text-center col-md-2">Nama</th>
                        <th class="text-center col-md-1">Username</th>
                        <th class="text-center col-md-2">Email</th>
                        <th class="text-center col-md-1">Hak akses</th>
                        <th class="text-center col-md-2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">
                                <div class="mt-1">{{ $loop->iteration }}</div>
                            </td>

                            <td class="text-center">
                                <div class="mt-1">{{ $item->nama }}</div>
                            </td>

                            <td class="text-center">
                                <div class="mt-1">{{ $item->username }}</div>
                            </td>

                            <td class="text-center">
                                <div class="mt-1">{{ $item->email }}</div>
                            </td>

                            <td class="text-center">
                                @if ($item->role_id == 1)
                                    <div class="badge mt-1" style="background-color: #72B5F6">
                                        Admin
                                    </div>
                                @else
                                    <div class="badge bg-secondary mt-1">
                                        User
                                    </div>
                                @endif
                            </td>

                            <td class="text-center">
                                <button class="btn btn-primary btn-sm" disabled><i
                                        class="bi bi-pencil me-2"></i>Edit</button>
                                <button class="btn btn-danger btn-sm" disabled><i
                                        class="bi bi-trash me-2"></i>Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- Modal Tambah Pengguna -->
    <div class="modal fade" id="addPengguna" tabindex="-1" aria-labelledby="addPenggunaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pengguna.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Hak Akses</label>
                            <select class="form-control" id="role" name="role">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
