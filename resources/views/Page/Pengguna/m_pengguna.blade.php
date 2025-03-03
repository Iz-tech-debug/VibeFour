@extends('dashboard')

@section('title', 'Manajemen Pengguna')

@section('content')

    <div class="container mt-4">
        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Manajemen Pengguna</h4>

            <a href="" class="btn btn-secondary">
                <i class="bi bi-plus"></i> Tambah Pengguna
            </a>
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



@endsection
