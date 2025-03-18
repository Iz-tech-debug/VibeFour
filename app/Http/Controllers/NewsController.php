<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Index + data
        $data = News::all();

        return view('Page.Berita.m_berita', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'judul' => 'required',
            'isi_konten' => 'required',
            'gambar' => 'required',
        ]);

        $news = new News();

        $news->judul = $request->judul;
        $news->konten = $request->isi_konten;

        // Cek jika file gambar diunggah
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');

            // Gunakan judul berita sebagai slug
            $slug = Str::slug($request->judul);
            $filenameToStore = $slug . '_' . time() . '.' . $file->getClientOriginalExtension();

            // Simpan file dengan nama slug di folder public/storage/images/news
            $path = $file->storeAs('images/news', $filenameToStore, 'public');

            // Hapus gambar lama jika ada
            if ($news->gambar) {
                Storage::disk('public')->delete($news->gambar);
            }

            // Simpan path gambar di database
            $news->gambar = $path;
        }

        // dd($news);

        $news->save();

        return redirect()->route('page.m_berita')->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::findOrFail($id); // Ambil data berita berdasarkan ID

        return view('Page.Berita.edit', compact('news')); // Kirim data ke view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'konten' => 'required',
            'gambar' => 'image', // Validasi gambar
        ]);

        $news = News::findOrFail($id);

        // Update data berita
        $news->judul = $request->judul;
        $news->konten = $request->konten;

        // Jika ada gambar baru diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($news->gambar) {
                Storage::disk('public')->delete($news->gambar);
            }

            // Buat nama file dengan slug berdasarkan judul
            $slug = Str::slug($request->judul);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileName = $slug . '-' . time() . '.' . $extension;

            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->storeAs('images/news', $fileName, 'public');

            // Simpan path ke database
            $news->gambar = $gambarPath;
        }

        $news->save();

        return redirect()->route('page.m_berita')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news, $id)
    {
        // Cari berita berdasarkan ID
        $news = News::find($id);

        if (!$news) {
            return response()->json(['message' => 'Berita tidak ditemukan'], 404);
        }

        // Hapus gambar dari storage jika ada
        if ($news->gambar && Storage::disk('public')->exists($news->gambar)) {
            Storage::disk('public')->delete($news->gambar);
        }

        // Hapus berita dari database
        $news->delete();

        return response()->json(['message' => 'Berita berhasil dihapus']);
    }
}
