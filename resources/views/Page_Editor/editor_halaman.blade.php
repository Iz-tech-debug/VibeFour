@extends('dashboard')

@section('title', 'Editor Halaman')

@section('content')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <h4 class="mt-2" style="color:blueviolet;">Editor Halaman</h4>
        </div>

        <br>

        <div class="card p-4 shadow-sm">

            <div class="row mt-1">
                <div class="col-md-9">
                    <h5 class="mt-2">Pilih Halaman</h5>
                </div>

                <div class="col-md-3">
                    <form method="GET" action="{{ route('editor.halaman') }}">
                        <select class="form-select" name="page" onchange="this.form.submit()">

                            <option value="halaman_depan"
                                {{ request('page') == 'halaman_depan' || !request('page') ? 'selected' : '' }}>
                                Beranda
                            </option>

                            <option value="header" {{ request('page') == 'header' ? 'selected' : '' }}>Header
                            </option>

                            <option value="produk" {{ request('page') == 'produk' ? 'selected' : '' }}>Produk
                            </option>

                            <option value="footer" {{ request('page') == 'footer' ? 'selected' : '' }}>Footer</option>

                            <option value="tentang" {{ request('page') == 'tentang' ? 'selected' : '' }}>Tentang
                            </option>

                            <option value="s&k" {{ request('page') == 's&k' ? 'selected' : '' }}>Syarat & Ketentuan
                            </option>

                            <option value="faq" {{ request('page') == 'faq' ? 'selected' : '' }}>F.A.Q</option>

                            <option value="kebijakan" {{ request('page') == 'halaman_kebijakan' ? 'selected' : '' }}>
                                Kebijakan Privasi</option>

                            <option value="kontak" {{ request('page') == 'kontak' ? 'selected' : '' }}>Kontak
                            </option>

                        </select>
                    </form>
                </div>
            </div>

            <hr>
            {{-- Form section halaman --}}
            @if (request('page'))
                @include('Page_Editor.Sections.' . request('page'))
            @else
                @include('Page_Editor.Sections.halaman_depan')
            @endif

        </div>

    </div>
@endsection
