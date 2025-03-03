<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // View Bahasa + data
        $bahasa = Language::all();

        return view('Page.Bahasa.bahasa', compact('bahasa'));
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
        $request->validate([
            'nama_bahasa' => 'required|unique:languages,nama_bahasa',
            'ikon_bahasa' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_bahasa.required' => 'Nama bahasa wajib diisi.',
            'nama_bahasa.unique' => 'Nama bahasa sudah ada, gunakan nama lain.',
            'gambar.required' => 'Ikon bahasa wajib diunggah.',
            'gambar.image' => 'Ikon harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus JPEG, PNG, atau JPG.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.'
        ]);

        // Buat objek model baru
        $language = new Language();
        $language->nama_bahasa = $request->nama_bahasa;

        // Cek jika file ikon diunggah
        if ($request->hasFile('ikon_bahasa')) {
            $file = $request->file('ikon_bahasa');
            $filenameToStore = Str::slug($request->nama_bahasa) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/icon_lang', $filenameToStore, 'public');

            // Simpan path ikon ke database
            $language->gambar = $path;
        }

        // Simpan ke database
        // dd($language);
        $language->save();

        return redirect()->route('bahasa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bahasa' => 'required|string|max:255',
            'ikon_bahasa' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $language = Language::findOrFail($id);

        $language->nama_bahasa = $request->nama_bahasa;

        if (!$language) {
            return redirect()->back()->with('error', 'Bahasa tidak ditemukan!');
        }

        if ($request->hasFile('ikon_bahasa')) {
            $file = $request->file('ikon_bahasa');
            $filenameToStore = Str::slug($request->nama_bahasa) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/icon_lang', $filenameToStore, 'public');

            // Hapus ikon lama jika ada
            if (!empty($language->gambar)) {
                Storage::disk('public')->delete($language->gambar);
            }

            // Simpan path ikon baru ke database
            $language->gambar = $path;
        }

        $language->save();

        return redirect()->back()->with('success', 'Bahasa berhasil diperbarui!');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language, $id)
    {
        // Hapus Bahasa
        $bahasa = Language::findOrFail($id);

        // Hapus ikon dari storage
        if ($bahasa->gambar) {
            Storage::delete('public/' . $bahasa->gambar);
        }

        // Hapus data dari database
        $bahasa->delete();

        return response()->json(['success' => 'Bahasa berhasil dihapus!']);

    }
}
