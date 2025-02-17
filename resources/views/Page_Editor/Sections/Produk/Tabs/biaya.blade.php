<div class="tab-pane fade show active" id="biaya">

    <div class="row">
        <div class="col-md-6">
            <h5 class="mt-2 ms-2">Paket Berlangganan</h5>
        </div>

        <div class="col-md-6">
            <div class="d-flex justify-content-end mb-3">
                <a href="/tambah_paket" class="btn btn-primary">Tambah paket</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th style="width: 5%;">#</th>
                <th>Nama Paket</th>
                <th style="width: 25%; white-space: nowrap;">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td>Basic</td>
                <td class="text-center" style="white-space: nowrap;">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailPaket1">
                        Detail
                    </button>
                    <a href="/edit_paket" class="btn btn-sm btn-success">Edit</a>
                    <button class="btn btn-sm btn-danger btn-hapus" data-nama="Basic">
                        Hapus
                    </button>
                </td>
            </tr>

            <tr>
                <td class="text-center">2</td>
                <td>Pro Plan Monthly</td>
                <td class="text-center" style="white-space: nowrap;">
                    <button class="btn btn-sm btn-primary">Detail</button>
                    <a href="/edit_paket" class="btn btn-sm btn-success">Edit</a>
                    <button class="btn btn-sm btn-danger btn-hapus" data-nama="Pro Plan Monthly">
                        Hapus
                    </button>
                </td>
            </tr>

            <tr>
                <td class="text-center">3</td>
                <td>Pro Plan Annual</td>
                <td class="text-center" style="white-space: nowrap;">
                    <button class="btn btn-sm btn-primary">Detail</button>
                    <a href="/edit_paket" class="btn btn-sm btn-success">Edit</a>
                    <button class="btn btn-sm btn-danger btn-hapus" data-nama="Pro Plan Annual">
                        Hapus
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

</div>

<div class="modal fade" id="detailPaket1" tabindex="-1" aria-labelledby="detailPaket1Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailPaket1Label">Detail Paket: Basic</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama Paket:</strong> Basic</p>
                <p><strong>Harga:</strong> Rp 50.000 / bulan</p>
                <p><strong>Masa Langganan:</strong> 1 Bulan</p>
                <p><strong>Fitur:</strong></p>
                <ul>
                    <li>Akses Dasar</li>
                    <li>Dukungan Standar</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".btn-hapus").forEach(button => {
            button.addEventListener("click", function() {
                let namaPaket = this.getAttribute("data-nama");

                Swal.fire({
                    title: "Konfirmasi Hapus",
                    text: `Apakah kamu yakin ingin menghapus paket "${namaPaket}"?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            "Dihapus!",
                            `Paket "${namaPaket}" telah dihapus.`,
                            "success"
                        );
                    }
                });
            });
        });
    });
</script>
