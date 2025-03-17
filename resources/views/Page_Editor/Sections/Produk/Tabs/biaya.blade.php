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
                <th style="width: 5%;">Nomor</th>
                <th>Nama Paket</th>
                <th style="width: 25%; white-space: nowrap;">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($paket as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td class="text-center" style="white-space: nowrap;">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#detailPaket{{ $item->id }}">
                            <i class="bi bi-info-circle me-2"></i>Detail
                        </button>
                        <a href="/edit_paket" class="btn btn-sm btn-success"><i class="bi bi-pencil me-2"></i>Edit</a>
                        <button class="btn btn-sm btn-danger btn-hapus" data-nama="{{ $item->nama }}">
                            <i class="bi bi-trash me-2"></i>Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>

@foreach ($paket as $item)
    <div class="modal fade" id="detailPaket{{ $item->id }}" tabindex="-1"
        aria-labelledby="detailPaket{{ $item->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailPaket{{ $item->id }}Label">Detail Paket: {{ $item->nama }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Paket:</strong> {{ $item->nama }}</p>
                    <p><strong>Harga:</strong> Rp {{ $item->harga }} </p>
                    <p><strong>Masa Langganan:</strong> {{ $item->durasi }} {{ $item->satuan_waktu }}</p>
                    <p><strong>Fitur:</strong></p>
                    <ul>
                        @foreach ($item->features as $feature)
                            <li>{{ $feature->fitur }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endforeach


<script></script>
