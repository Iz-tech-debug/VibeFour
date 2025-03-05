<?php

namespace App\Http\Controllers\editor_halaman;

use App\Http\Controllers\Controller;
use App\Models\Header;
use App\Models\Language;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    /**
     * Menampilkan halaman editor header dengan bahasa default (ID = 1).
     */
    public function index()
    {
        $bahasa = Language::all();
        $bahasa_id = 1;
        $data = Header::where('bahasa_id', $bahasa_id)->pluck('isi', 'nama');

        return view('Page_Editor.Sections.header', compact('data', 'bahasa', 'bahasa_id'));
    }

    /**
     * Mengambil data header berdasarkan bahasa yang dipilih (AJAX).
     */
    public function getHeaderByBahasa($bahasa_id)
    {
        $data = Header::where('bahasa_id', $bahasa_id)->pluck('isi', 'nama');

        return response()->json($data);
    }

    /**
     * Memperbarui data header (hanya bahasa default = 1).
     */
    public function update(Request $request)
    {
        $request->validate([
            'beranda' => 'required|string',
            'tentang' => 'required|string',
            'kontak' => 'required|string',
            'produk' => 'required|string',
            'produk_a' => 'required|string',
            'produk_b' => 'required|string',
            'teks_tombol' => 'required|string',
        ]);

        $bahasa_id = 1;

        $fields = [
            'Beranda' => $request->beranda,
            'Tentang' => $request->tentang,
            'Kontak' => $request->kontak,
            'Produk' => $request->produk,
            'Produk Voting' => $request->produk_a,
            'Produk Penjadwalan' => $request->produk_b,
            'Teks Masuk' => $request->teks_tombol,
        ];

        foreach ($fields as $key => $value) {
            Header::updateOrCreate(
                ['bahasa_id' => $bahasa_id, 'nama' => $key],
                ['isi' => $value ?: '-']
            );
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }
}
