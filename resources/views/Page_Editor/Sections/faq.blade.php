{{-- SA --}}

@include('Modal.Editor.sa')

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

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase(); // Ambil nilai input dan ubah ke huruf kecil
        const rows = document.querySelectorAll('#myTable tbody tr'); // Ambil semua baris tabel

        rows.forEach(row => {
            const cellText = row.cells[1].textContent.toLowerCase(); // Ambil teks di kolom "Pertanyaan"
            if (cellText.includes(searchValue)) {
                row.style.display = ''; // Tampilkan baris jika cocok
            } else {
                row.style.display = 'none'; // Sembunyikan baris jika tidak cocok
            }
        });
    });
</script>
