@extends('dashboard')

@section('title', 'Editor Halaman - F.A.Q')

@section('content')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm">
            <h4 class="mt-2" style="color:blueviolet;">Editor Halaman</h4>
        </div>

        <br>

        <div class="card p-4 shadow-sm">

            <div class="row mt-1">
                <div class="col-md-9">
                    <h5 class="mt-2">Beranda</h5>
                </div>
            </div>

            <hr>


            <div class="row mb-2">

                <div class="col-md-8">
                    <h4>Pertanyaan-pertanyaan Umum</h4>
                </div>

                <div class="col">
                    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Cari pertanyaan...">
                </div>
            </div>

            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Nomor</th>
                        <th class="text-center">Pertanyaan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>Bagaimana cara mendaftar akun?</td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm">Detail</button>
                            <button class="btn btn-success btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>Apa yang dimaksud dengan layanan premium?</td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm">Detail</button>
                            <button class="btn btn-success btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td>Bagaimana cara menghubungi layanan pelanggan?</td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm">Detail</button>
                            <button class="btn btn-success btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#myTable tbody tr');

            rows.forEach(row => {
                const cellText = row.cells[1].textContent.toLowerCase();
                if (cellText.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

@endsection
