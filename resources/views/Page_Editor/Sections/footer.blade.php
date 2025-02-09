<form action="#" method="post">
    @csrf
    <div class="mb-3">
        <label for="judul" class="form-label">Halo</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul">
    </div>
    <div class="mb-3">
        <label for="konten" class="form-label">Konten</label>
        <textarea class="form-control" id="konten" name="konten" rows="4" placeholder="Masukkan konten"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
