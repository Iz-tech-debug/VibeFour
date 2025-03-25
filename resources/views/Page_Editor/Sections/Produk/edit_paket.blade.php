@extends('dashboard')

@section('title', 'Editor Halaman - Tambah Paket Berlangganan')

@section('content')

    <div class="container mt-4">
        <div class="card p-3 shadow-sm">
            <h4 class="mt-2" style="color:blueviolet;">Editor Halaman</h4>
        </div>

        <br>

        <div class="card p-4 shadow-sm">
            <div class="row mt-1">
                <div class="col-md-9">
                    <h5 class="mt-2">Tambah Paket Berlangganan</h5>
                </div>

                <div class="col-md-3 text-end">
                    <a href="{{route('biaya.index')}}" class="btn btn-secondary mt-2">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <hr>

            <form action="#" method="POST">
                @csrf

                <!-- Nama Paket & Harga Per-Langganan -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" placeholder="Ketik disini..." required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Harga per-langganan</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" placeholder="Ketik nominal..."
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                        <small class="text-muted">
                            <i class="bi bi-question-circle"></i> Kosongkan nominal harga untuk tanpa biaya berlangganan
                        </small>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label mt-2">Masa Langganan</label>
                    </div>

                    <div class="col-md-5">
                        <div class="d-flex align-items-center">
                            <span class="me-3">:</span>

                            <input type="number" class="form-control text-center me-2" style="width: 60px;"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">

                            <select class="form-select" style="width: auto;">
                                <option>Bulan</option>
                                <option>Tahun</option>
                            </select>
                        </div>
                    </div>

                </div>

                <hr>

                <div class="mb-3">
                    <label class="form-label">Fitur-fitur</label>
                    <div id="fitur-container">
                        <div class="d-flex mb-2 fitur-item">
                            <input type="text" class="form-control" placeholder="Ketik disini..." required>
                            <button type="button" class="btn btn-danger ms-2 hapusFitur" disabled>
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success mt-2" id="tambahFitur">
                        Tambah Fitur
                    </button>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                        <label for="pilihBahasa" class="form-label me-2 mt-2">Simpan untuk bahasa: </label>
                        <select id="pilihBahasa" name="pilihBahasa" class="form-select w-auto">
                            {{-- @foreach ($lang as $item)
                                <option value="{{ $item->id }}"> {{ $item->nama_bahasa }}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="col-md-6 text-end">
                        <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const fiturContainer = document.getElementById("fitur-container");
            const tambahFiturBtn = document.getElementById("tambahFitur");

            function updateHapusButtons() {
                const hapusButtons = document.querySelectorAll(".hapusFitur");

                if (hapusButtons.length === 1) {
                    hapusButtons[0].disabled = true; // Nonaktifkan jika hanya ada 1 fitur
                } else {
                    hapusButtons.forEach(btn => btn.disabled = false);
                }
            }

            tambahFiturBtn.addEventListener("click", function() {
                let newFitur = document.createElement("div");
                newFitur.classList.add("d-flex", "mb-2", "fitur-item");
                newFitur.innerHTML = `
                    <input type="text" class="form-control" placeholder="Ketik disini..." required>
                    <button type="button" class="btn btn-danger ms-2 hapusFitur">
                        <i class="bi bi-trash"></i>
                    </button>
                `;

                fiturContainer.appendChild(newFitur);
                updateHapusButtons();
            });

            fiturContainer.addEventListener("click", function(event) {
                if (event.target.classList.contains("hapusFitur") || event.target.closest(".hapusFitur")) {
                    event.target.closest(".fitur-item").remove();
                    updateHapusButtons();
                }
            });

            updateHapusButtons(); // Jalankan fungsi saat halaman dimuat
        });
    </script>

@endsection
