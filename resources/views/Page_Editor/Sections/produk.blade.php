@extends('dashboard')

@section('title', 'Editor Halaman - Produk & Biaya')

@section('content')

    @include('Modal.Editor.Produk&Biaya.detail')

    <div class="container mt-4">

        <!-- Header -->
        <div class="card p-3 shadow-sm">
            <h4 class="mt-2" style="color:blueviolet;">Editor Halaman</h4>
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
