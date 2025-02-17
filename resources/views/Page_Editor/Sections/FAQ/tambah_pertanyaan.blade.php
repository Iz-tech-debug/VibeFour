@extends('dashboard')

@section('title', 'Editor Halaman - Tambah Pertanyaan')

@section('content')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">F.A.Q / Pertanyaan Umum</h4>

            <a href="/editor_faq" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>


        <br>

        <div class="card p-4 shadow-sm">

            <form action="/tambah_faq" method="post">
                @csrf

                <div id="faqContainer">
                    <div class="faq-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Pertanyaan (Bahasa Indonesia):</label>
                                    <input type="text" class="form-control pertanyaan_idn" name="pertanyaan_idn[]"
                                        placeholder="Ketik disini..." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Pertanyaan (Bahasa Inggris):</label>
                                    <input type="text" class="form-control pertanyaan_eng" name="pertanyaan_eng[]"
                                        placeholder="Ketik disini..." required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Jawaban (Bahasa Indonesia):</label>
                                    <textarea class="form-control editor" name="jawaban_idn[]" rows="5" placeholder="Ketik disini..." required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Jawaban (Bahasa Inggris):</label>
                                    <textarea class="form-control editor" name="jawaban_eng[]" rows="5" placeholder="Ketik disini..." required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-danger btn-hapus" disabled>
                                Hapus Pertanyaan
                            </button>
                        </div>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button type="button" class="btn btn-success" id="btnTambah">
                        <i class="bi bi-plus-lg"></i> Tambah Pertanyaan
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const faqContainer = document.getElementById("faqContainer");
            const btnTambah = document.getElementById("btnTambah");

            function updateDeleteButtons() {
                const deleteButtons = document.querySelectorAll(".btn-hapus");
                if (deleteButtons.length === 1) {
                    deleteButtons[0].disabled = true; // Nonaktifkan tombol hapus jika hanya 1 pertanyaan
                } else {
                    deleteButtons.forEach(btn => btn.disabled = false);
                }
            }

            btnTambah.addEventListener("click", function() {
                let newFaq = document.createElement("div");
                newFaq.classList.add("faq-item");
                newFaq.innerHTML = `
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pertanyaan (Bahasa Indonesia):</label>
                                <input type="text" class="form-control pertanyaan_idn" name="pertanyaan_idn[]" placeholder="Ketik disini..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pertanyaan (Bahasa Inggris):</label>
                                <input type="text" class="form-control pertanyaan_eng" name="pertanyaan_eng[]" placeholder="Ketik disini..." required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Jawaban (Bahasa Indonesia):</label>
                                <textarea class="form-control editor" name="jawaban_idn[]" rows="5" placeholder="Ketik disini..." required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Jawaban (Bahasa Inggris):</label>
                                <textarea class="form-control editor" name="jawaban_eng[]" rows="5" placeholder="Ketik disini..." required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="button" class="btn btn-danger btn-hapus">
                            Hapus Pertanyaan
                        </button>
                    </div>
                `;

                faqContainer.appendChild(newFaq);
                updateDeleteButtons();
            });

            faqContainer.addEventListener("click", function(event) {
                if (event.target.classList.contains("btn-hapus")) {
                    event.target.closest(".faq-item").remove();
                    updateDeleteButtons();
                }
            });

            updateDeleteButtons(); // Pastikan tombol hapus pertama dinonaktifkan saat halaman dimuat
        });
    </script>

@endsection
