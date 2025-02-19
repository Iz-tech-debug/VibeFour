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
    $(document).ready(function() {
        
        function updateDeleteButtons(container, buttonClass) {
            let items = $(container).children();
            let buttons = $(container).find(buttonClass);
            buttons.prop("disabled", items.length === 1);
        }

        const votingContainer = $(".votingContainer");

        $("#btnTambahVoting").on("click", function() {
            let newVoting = `
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
                <hr>
            </div>`;
            votingContainer.append(newVoting);
            updateDeleteButtons(votingContainer, ".btn-hapus-voting");
        });

        $(document).on("click", ".btn-hapus-voting", function() {
            $(this).closest(".voting-item").remove();
            updateDeleteButtons(votingContainer, ".btn-hapus-voting");
        });

        const voteContainer = $(".voteContainer");

        $("#btnTambahPanduanVote").on("click", function() {
            let newVote = `
            <div class="vote-item">
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
                <hr>
            </div>`;
            voteContainer.append(newVote);
        });

        $(document).on("click", ".btn-hapus-vote", function() {
            $(this).closest(".vote-item").remove();
        });

        const crtVoteContainer = $(".crtVoteContainer");

        $("#btnTambahPanduanSubjek").on("click", function() {
            let newSubjek = `
            <div class="crtVote-item">
                <hr>
                <div class="mb-3">
                    <label class="form-label fw-bold">Panduan Membuat Subjek Vote:</label>
                    <textarea class="form-control" name="panduan_subjek_vote[]" rows="3" placeholder="Panduan membuat subjek vote..." required></textarea>
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
            </div>`;
            crtVoteContainer.append(newSubjek);
        });

        $(document).on("click", ".btn-hapus-subjek", function() {
            $(this).closest(".crtVote-item").remove();
        });

        updateDeleteButtons(votingContainer, ".btn-hapus-voting");
    });
</script>
