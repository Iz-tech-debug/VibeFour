@extends('dashboard')

@section('title', 'Manajemen Pengguna')

@section('content')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Manajemen Bahasa</h4>

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
                        <th class="text-center col-md-1" >Nomor</th>
                        <th class="text-center col-md-2">Nama</th>
                        <th class="text-center col-md-1">Username</th>
                        <th class="text-center col-md-2">Email</th>
                        <th class="text-center col-md-1">Hak akses</th>
                        <th class="text-center col-md-1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>

    </div>

@endsection
