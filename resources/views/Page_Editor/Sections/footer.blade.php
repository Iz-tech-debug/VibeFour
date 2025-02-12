@include('Modal.Editor.sa')

<form action="#" method="post">
    @csrf

    <!-- Deskripsi Alamat -->
    <div class="mb-3">
        <label for="editorAlamat" class="form-label fw-bold">Deskripsi Alamat :</label>
        <textarea id="editorAlamat" class="editor" rows="5" placeholder="Ketik disini....." required></textarea>
    </div>

    <div class="row mb-3">
        {{-- WA --}}
        <div class="col-md-6">
            <label for="nomorWA" class="form-label fw-bold">Nomor Whatsapp:</label>
            <div class="input-group">
                <span class="input-group-text">+62</span>
                <input type="number" id="nomorWA" class="form-control" placeholder="Ketik disini....."
                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
            </div>
        </div>

        {{-- CS --}}
        <div class="col-md-6">
            <label for="nomorCS" class="form-label fw-bold">Nomor Pelayanan Pengguna:</label>
            <div class="input-group">
                <span class="input-group-text">+62</span>
                <input type="number" id="nomorWA" class="form-control" placeholder="Ketik disini....."
                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
            </div>
        </div>
    </div>

    <hr>

    {{-- Produk Voting --}}
    <div class="mb-3">
        <label for="prodVote" class="form-label fw-bold">Produk A:</label>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Bahasa Indonesia</span>
                    <input type="text" id="prodVote" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">

                    <span class="input-group-text">Bahasa Inggris</span>
                    <input type="text" id="prodVote" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>
        </div>
    </div>

    {{-- Produk Penjadwalan --}}
    <div class="mb-3">
        <label for="prodJdwl" class="form-label fw-bold">Produk B:</label>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Bahasa Indonesia</span>
                    <input type="text" id="prodJdwl" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">

                    <span class="input-group-text">Bahasa Inggris</span>
                    <input type="text" id="prodJdwl" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <!-- About Us -->
    <div class="mb-3">
        <label for="tentang" class="form-label fw-bold">Tentang:</label>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Bahasa Indonesia</span>
                    <input type="text" id="tentang" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">

                    <span class="input-group-text">Bahasa Inggris</span>
                    <input type="text" id="tentang" class="form-control" placeholder="Ketik disini....." required>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Us -->
    <div class="mb-3">
        <label for="kontak" class="form-label fw-bold">Kontak:</label>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Bahasa Indonesia</span>
                    <input type="text" id="kontak" class="form-control" placeholder="Ketik disini....."
                        required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">

                    <span class="input-group-text">Bahasa Inggris</span>
                    <input type="text" id="kontak" class="form-control" placeholder="Ketik disini....."
                        required>
                </div>
            </div>
        </div>
    </div>

    <!-- News -->
    <div class="mb-3">
        <label for="berita" class="form-label fw-bold">Berita:</label>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Bahasa Indonesia</span>
                    <input type="text" id="berita" class="form-control" placeholder="Ketik disini....."
                        required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">

                    <span class="input-group-text">Bahasa Inggris</span>
                    <input type="text" id="berita" class="form-control" placeholder="Ketik disini....."
                        required>
                </div>
            </div>
        </div>
    </div>

    <!-- T&C -->
    <div class="mb-3">
        <label for="s&k" class="form-label fw-bold">Syarat & Ketentuan:</label>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Bahasa Indonesia</span>
                    <input type="text" id="s&k" class="form-control" placeholder="Ketik disini....."
                        required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">

                    <span class="input-group-text">Bahasa Inggris</span>
                    <input type="text" id="s&k" class="form-control" placeholder="Ketik disini....."
                        required>
                </div>
            </div>
        </div>
    </div>

    <!-- Privacy Policies -->
    <div class="mb-3">
        <label for="pvp" class="form-label fw-bold">Kebijakan Privasi:</label>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Bahasa Indonesia</span>
                    <input type="text" id="pvp" class="form-control" placeholder="Ketik disini....."
                        required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">

                    <span class="input-group-text">Bahasa Inggris</span>
                    <input type="text" id="pvp" class="form-control" placeholder="Ketik disini....."
                        required>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div class="mb-3">
        <label for="faq" class="form-label fw-bold">Pertanyaan Umum:</label>

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text">Bahasa Indonesia</span>
                    <input type="text" id="faq" class="form-control" placeholder="Ketik disini....."
                        required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">

                    <span class="input-group-text">Bahasa Inggris</span>
                    <input type="text" id="faq" class="form-control" placeholder="Ketik disini....."
                        required>
                </div>
            </div>
        </div>
    </div>


    <div class="text-end">
        <button type="button" class="btn btn-primary" id="btnSimpan">
            Simpan
        </button>
    </div>

</form>

<script>
    document.getElementById('btnSimpan').addEventListener('click', function() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menyimpan ini?',
            text: 'Perubahan akan terjadi di website',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika dikonfirmasi, lakukan sesuatu
                Swal.fire({
                    title: 'Tersimpan!',
                    text: 'Data Anda telah disimpan.',
                    icon: 'success'
                });
            }
        });
    });
</script>
