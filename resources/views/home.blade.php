@extends('dashboard')

@section('title', 'Dashboard')

@section('content')

    <div class="container mt-4">
        <div class="card p-3 shadow-sm">
            <h4 class="mt-2" style="color:blueviolet;">Beranda</h4>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card p-3 shadow-sm">
                    <h5 class="mt-2">Card 1</h5>
                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, doloremque.</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-3 shadow-sm">
                    <h5 class="mt-2">Card 2</h5>
                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, doloremque.</p>
                </div>
            </div>
        </div>

        <br>


    </div>

@endsection
