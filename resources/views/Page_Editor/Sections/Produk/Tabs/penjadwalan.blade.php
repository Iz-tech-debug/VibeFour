    <div class="tab-pane fade" id="penjadwalan">

        <div class="row">
            <div class="col-md-9">
                <h5 class="mt-3">Keunggulan Fitur Penjadwalan</h5>
            </div>

            <div class="col-md-3 text-end">
                <div class="text-end">
                    <button type="button" class="btn btn-primary mt-2" id="btnTambahKeunggulan">Tambah Keunggulan</button>
                </div>
            </div>
        </div>

        <hr>

        <div class="keunggulanContainer">
            <div class="keunggulan-item">
                <div class="mb-3">
                    <label class="form-label fw-bold">Keunggulan Fitur Penjadwalan:</label>
                    <textarea class="form-control" name="keunggulan_penjadwalan[]" rows="3" placeholder="Keunggulan fitur ini..."
                        required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Ikon:</label>
                    <input type="file" class="form-control" name="ikon_keunggulan[]" accept="image/*">
                    <i class="bi bi-info-circle"></i>
                    <small class="text-muted">Tambahkan foto panduan dengan rasio 1:1</small>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-danger btn-hapus-keunggulan">Hapus Keunggulan</button>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-9">
                <h5 class="mt-3">Panduan Fitur Penjadwalan</h5>
            </div>

            <div class="col-md-3 text-end">
                <div class="text-end">
                    <button type="button" class="btn btn-primary mt-2" id="btnTambahPanduan">Tambah Panduan</button>
                </div>
            </div>
        </div>

        <hr>

        <div id="panduanContainer">
            <div class="panduan-item">
                <div class="mb-3">
                    <label class="form-label fw-bold">Keterangan Panduan</label>
                    <textarea class="form-control" name="keterangan_panduan[]" rows="3" placeholder="Panduan fitur ini..." required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Upload Foto Panduan</label>
                    <input type="file" class="form-control" name="foto_panduan[]">
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-danger btn-hapus-panduan">Hapus Panduan</button>
                </div>
            </div>
        </div>

    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const panduanContainer = document.getElementById("panduanContainer");
            const btnTambahPanduan = document.getElementById("btnTambahPanduan");

            function updateDeleteButtons() {
                const deleteButtons = document.querySelectorAll(".btn-hapus-panduan");
                if (deleteButtons.length === 1) {
                    deleteButtons[0].disabled = true;
                } else {
                    deleteButtons.forEach(btn => btn.disabled = false);
                }
            }

            btnTambahPanduan.addEventListener("click", function() {
                let newPanduan = document.createElement("div");
                newPanduan.classList.add("panduan-item");
                newPanduan.innerHTML = `
                <div class="mb-3">
                    <label class="form-label fw-bold">Keterangan Panduan</label>
                    <textarea class="form-control" name="keterangan_panduan[]" rows="3" placeholder="Panduan fitur ini..." required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Upload Foto Panduan</label>
                    <input type="file" class="form-control" name="foto_panduan[]">
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-danger btn-hapus-panduan">Hapus Panduan</button>
                </div>
            `;
                panduanContainer.appendChild(newPanduan);
                updateDeleteButtons();
            });

            panduanContainer.addEventListener("click", function(event) {
                if (event.target.classList.contains("btn-hapus-panduan")) {
                    event.target.closest(".panduan-item").remove();
                    updateDeleteButtons();
                }
            });

            updateDeleteButtons();
        });

        document.addEventListener("DOMContentLoaded", function() {
            const keunggulanContainer = document.querySelector(".keunggulanContainer");
            const btnTambahKeunggulan = document.getElementById("btnTambahKeunggulan");

            function updateDeleteButtons() {
                const deleteButtons = document.querySelectorAll(".btn-hapus-keunggulan");
                if (deleteButtons.length === 1) {
                    deleteButtons[0].disabled = true; // Nonaktifkan tombol hapus jika hanya ada satu keunggulan
                } else {
                    deleteButtons.forEach(btn => btn.disabled = false);
                }
            }

            btnTambahKeunggulan.addEventListener("click", function() {
                let newKeunggulan = document.createElement("div");
                newKeunggulan.classList.add("keunggulan-item");
                newKeunggulan.innerHTML = `
                <div class="mb-3">
                    <label class="form-label fw-bold">Keunggulan Fitur Penjadwalan:</label>
                    <textarea class="form-control" name="keunggulan_penjadwalan[]" rows="3" placeholder="Keunggulan fitur ini..." required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Ikon:</label>
                    <input type="file" class="form-control" name="ikon_keunggulan[]" accept="image/*">
                    <i class="bi bi-info-circle"></i>
                    <small class="text-muted">Tambahkan foto panduan dengan rasio 1:1</small>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-danger btn-hapus-keunggulan">Hapus Keunggulan</button>
                </div>
            `;
                keunggulanContainer.appendChild(newKeunggulan);
                updateDeleteButtons();
            });

            keunggulanContainer.addEventListener("click", function(event) {
                if (event.target.classList.contains("btn-hapus-keunggulan")) {
                    event.target.closest(".keunggulan-item").remove();
                    updateDeleteButtons();
                }
            });

            updateDeleteButtons(); // Pastikan tombol hapus pertama dinonaktifkan saat halaman dimuat
        });
    </script>
