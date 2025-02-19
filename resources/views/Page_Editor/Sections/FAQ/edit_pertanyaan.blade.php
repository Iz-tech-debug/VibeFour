@extends('dashboard')

@section('title', 'Editor Halaman - Edit Pertanyaan')

@section('content')

    <div class="container mt-4">

        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">F.A.Q / Pertanyaan Umum</h4>

            <a href="/editor_faq" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <br>

        <div class="card p-4 shadow-sm">

            <form action="/edit_pertanyaan" method="post">
                @csrf
                @method('put')

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pertanyaan_idn" class="form-label">Pertanyaan Bahasa Indonesia</label>
                            <input type="text" class="form-control" id="pertanyaan_idn" name="pertanyaan_idn"
                                value="" placeholder="Ketik disini...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pertanyaan_eng" class="form-label">Pertanyaan Bahasa Inggris</label>
                            <input type="text" class="form-control" id="pertanyaan_eng" name="pertanyaan_eng"
                                value="" placeholder="Ketik disini...">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="editorIDN" class="form-label">Jawaban Bahasa Indonesia</label>
                            <textarea class="editor" id="editorIDN" name="jawaban_idn" rows="5" placeholder="Ketik disini..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="editorENG" class="form-label">Jawaban Bahasa Inggris</label>
                            <textarea class="editor" id="editorENG" name="jawaban_eng" rows="5" placeholder="Ketik disini..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
