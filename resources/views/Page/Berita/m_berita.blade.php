@extends('dashboard')

@section('title', 'Manajemen Berita')

@section('content')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">Manajemen Berita</h4>

            <a href="/tambah_berita" class="btn btn-primary">
                <i class="bi bi-plus"></i> Tambah Berita
            </a>
        </div>

        <br>

        <div class="card p-4 shadow-sm">

        </div>

    </div>

@endsection
