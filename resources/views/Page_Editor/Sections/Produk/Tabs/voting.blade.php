<div class="tab-pane fade" id="voting">

    <div class="row">
        <div class="col-md-9">
            <h5 class="mt-3">Keunggulan Fitur Voting</h5>
        </div>

        <div class="col-md-3 text-end">
            <div class="text-end">
                <button type="button" class="btn btn-primary mt-2" id="btnTambahVoting">Tambah Keunggulan</button>
            </div>
        </div>
    </div>

    <hr>

    <div class="votingContainer">
        <div class="voting-item">
            <div class="mb-3">
                <label class="form-label fw-bold">Keunggulan Fitur Voting:</label>
                <textarea class="form-control" name="keunggulan_voting[]" rows="3" placeholder="Keunggulan fitur ini..." required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Ikon:</label>
                <input type="file" class="form-control" name="ikon_voting[]" accept="image/*">
                <i class="bi bi-info-circle"></i>
                <small class="text-muted">Tambahkan foto panduan dengan rasio 1:1</small>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-danger btn-hapus-voting">Hapus Keunggulan</button>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-9">
            <h5 class="mt-3">Panduan Memvoting</h5>
        </div>

        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-primary mt-2" id="btnTambahPanduanVote">Tambah Panduan Voting</button>
        </div>
    </div>

    <hr>

    <div class="voteContainer">
        <div class="vote-item">
            <div class="mb-3">
                <label class="form-label fw-bold">Panduan Memvoting:</label>
                <textarea class="form-control" name="panduan_vote[]" rows="3" placeholder="Panduan cara memvoting..." required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Gambar Panduan:</label>
                <input type="file" class="form-control" name="gambar_vote[]" accept="image/*">
                <i class="bi bi-info-circle"></i>
                <small class="text-muted">Tambahkan gambar panduan dengan rasio 16:9</small>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-danger btn-hapus-vote">Hapus Panduan</button>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-9">
            <h5 class="mt-3">Panduan Membuat Subjek Vote</h5>
        </div>

        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-primary mt-2" id="btnTambahPanduanSubjek">Tambah Panduan</button>
        </div>
    </div>

    <hr>

    <div class="crtVoteContainer">
        <div class="crtVote-item">
            <div class="mb-3">
                <label class="form-label fw-bold">Panduan Membuat Subjek Vote:</label>
                <textarea class="form-control" name="panduan_subjek_vote[]" rows="3" placeholder="Panduan membuat subjek vote..."
                    required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Gambar Panduan:</label>
                <input type="file" class="form-control" name="gambar_subjek_vote[]" accept="image/*">
                <i class="bi bi-info-circle"></i>
                <small class="text-muted">Tambahkan gambar panduan dengan rasio 16:9</small>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-danger btn-hapus-subjek">Hapus Panduan</button>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Fungsi Tambah & Hapus Keunggulan Voting
        const votingContainer = document.querySelector(".votingContainer");
        const btnTambahVoting = document.getElementById("btnTambahVoting");

        function updateDeleteButtons(container, className) {
            const deleteButtons = container.querySelectorAll(className);
            if (deleteButtons.length === 1) {
                deleteButtons[0].disabled = true;
            } else {
                deleteButtons.forEach(btn => btn.disabled = false);
            }
        }

        btnTambahVoting.addEventListener("click", function() {
            let newVoting = document.createElement("div");
            newVoting.classList.add("voting-item");
            newVoting.innerHTML = `
                <div class="mb-3">
                    <label class="form-label fw-bold">Keunggulan Fitur membuat subjek voting:</label>
                    <textarea class="form-control" name="keunggulan_voting[]" rows="3" placeholder="Keunggulan fitur ini..." required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Ikon:</label>
                    <input type="file" class="form-control" name="ikon_voting[]" accept="image/*">
                    <i class="bi bi-info-circle"></i>
                    <small class="text-muted">Tambahkan foto panduan dengan rasio 1:1</small>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-danger btn-hapus-voting">Hapus Keunggulan</button>
                </div>
                <hr>
            `;
            votingContainer.appendChild(newVoting);
            updateDeleteButtons(votingContainer, ".btn-hapus-voting");
        });

        votingContainer.addEventListener("click", function(event) {
            if (event.target.classList.contains("btn-hapus-voting")) {
                event.target.closest(".voting-item").remove();
                updateDeleteButtons(votingContainer, ".btn-hapus-voting");
            }
        });

        // Fungsi Tambah & Hapus Panduan Memvoting
        const voteContainer = document.querySelector(".voteContainer");
        const btnTambahPanduanVote = document.getElementById("btnTambahPanduanVote");

        btnTambahPanduanVote.addEventListener("click", function() {
            let newVote = document.createElement("div");
            newVote.classList.add("vote-item");
            newVote.innerHTML = `
                <div class="mb-3">
                    <label class="form-label fw-bold">Panduan Memvoting:</label>
                    <textarea class="form-control" name="panduan_vote[]" rows="3" placeholder="Panduan cara memvoting..." required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Gambar Panduan:</label>
                    <input type="file" class="form-control" name="gambar_vote[]" accept="image/*">
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-danger btn-hapus-vote">Hapus Panduan</button>
                </div>
            `;
            voteContainer.appendChild(newVote);
        });

        voteContainer.addEventListener("click", function(event) {
            if (event.target.classList.contains("btn-hapus-vote")) {
                event.target.closest(".vote-item").remove();
            }
        });

        // Fungsi Tambah & Hapus Panduan Membuat Subjek Vote
        const crtVoteContainer = document.querySelector(".crtVoteContainer");
        const btnTambahPanduanSubjek = document.getElementById("btnTambahPanduanSubjek");

        btnTambahPanduanSubjek.addEventListener("click", function() {
            let newSubjek = document.createElement("div");
            newSubjek.classList.add("crtVote-item");
            newSubjek.innerHTML = `
                <hr>
                <div class="mb-3">
                    <label class="form-label fw-bold">Panduan Fitur Voting:</label>
                    <textarea class="form-control" name="keunggulan_voting[]" rows="3" placeholder="Keunggulan fitur ini..." required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Ikon:</label>
                    <input type="file" class="form-control" name="ikon_voting[]" accept="image/*">
                    <i class="bi bi-info-circle"></i>
                    <small class="text-muted">Tambahkan foto panduan dengan rasio 1:1</small>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-danger btn-hapus-voting">Hapus Panduan</button>
                </div>
                `;
            crtVoteContainer.appendChild(newSubjek);
        });

        crtVoteContainer.addEventListener("click", function(event) {
            if (event.target.classList.contains("btn-hapus-subjek")) {
                event.target.closest(".crtVote-item").remove();
            }
        });
    });
</script>
