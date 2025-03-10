@extends('dashboard')

@section('title', 'Editor Halaman - Tambah Pertanyaan')

@section('content')

    <style>
        .ck-editor__editable {
            min-height: 250px;
        }
    </style>

    <div class="container mt-4">

        <div class="card p-3 shadow-sm d-flex flex-row justify-content-between align-items-center">
            <h4 class="mt-2" style="color:blueviolet;">F.A.Q / Pertanyaan Umum</h4>

            <a href="{{ route('faq.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <br>

        <form action="{{ route('faq.add') }}" method="post">
            @csrf

            <div class="card p-4 shadow-sm">

                {{-- Pertanyaan --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="pertanyaan" class="form-label mt-1 fw-bold">Pertanyaan:</label>
                    </div>

                    <div class="col-md">
                        <input type="text" id="pertanyaan" class="form-control" name="pertanyaan"
                            placeholder="Ketik disini....." required>
                    </div>
                </div>

                {{-- Jawaban --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="jawaban" class="form-label mt-1 fw-bold">Jawaban:</label>
                    </div>

                    <div class="col-md">
                        <textarea name="jawaban" class="form-control" placeholder="Ketik disini....." id="editor"></textarea>
                    </div>
                </div>

            </div>

            <br>

            <div class="card p-4 shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <label for="bahasa_id" class="form-label fw-bold me-2 mb-0">Simpan sebagai:</label>

                        <select name="bahasa_id" id="bahasa_id" class="form-select w-auto" required>
                            @foreach ($bahasa as $item)
                                <option value="{{ $item->id }}">
                                    Bahasa {{ $item->nama_bahasa }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-2"></i>Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script></script>


@endsection
