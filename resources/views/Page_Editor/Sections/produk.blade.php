@extends('dashboard')

@section('title', 'Editor Halaman - Produk & Biaya')

@section('content')
    <style>
        .ck-editor__editable {
            min-height: 250px;
        }
    </style>
    @include('Modal.Editor.Produk&Biaya.detail')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <div class="row">
                <div class="col-md">
                    <h4 class="mt-2" style="color:blueviolet;">Editor Halaman</h4>
                </div>

                <div class="col-md-3 mt-1 text-end">
                    <select class="form-select" aria-label="Pilih Bahasa">
                        <option value="1">Bahasa Indonesia</option>
                        <option value="2">Bahasa Inggris</option>
                    </select>
                </div>
            </div>
        </div>

        <br>

        <div class="card p-4 shadow-sm">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="biaya-tab" data-bs-toggle="tab" href="#biaya">Biaya</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="voting-tab" data-bs-toggle="tab" href="#voting">Voting</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="penjadwalan-tab" data-bs-toggle="tab" href="#penjadwalan">Penjadwalan</a>
                </li>
            </ul>

            <div class="tab-content mt-3">
                @include('Page_Editor.Sections.Produk.Tabs.biaya')

                @include('Page_Editor.Sections.Produk.Tabs.voting')

                @include('Page_Editor.Sections.Produk.Tabs.penjadwalan')
            </div>

        </div>

    </div>

@endsection
