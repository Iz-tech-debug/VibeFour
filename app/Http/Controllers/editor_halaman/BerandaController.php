<?php

namespace App\Http\Controllers\editor_halaman;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home;

class BerandaController extends Controller
{
    public function index()
    {
        // View + data
        $bahasa = Language::all();

        // Ambil data kontak dengan bahasa default (misalnya bahasa dengan ID 1)
        $data = Home::where('bahasa_id', 1)
            ->pluck('isi', 'nama');

        $bahasa_id = 1;

        return view('Page_Editor.Sections.beranda', compact('data', 'bahasa', 'bahasa_id'));
    }

    public function switch($bahasaId)
    {
        // Ambil data berdasarkan bahasa_id
        $beranda = Home::where('bahasa_id', $bahasaId)->pluck('isi', 'nama');

        // Cek apakah data ditemukan
        if ($beranda->isEmpty()) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($beranda);
    }

    public function update(Request $request, $bahasa)
    {
        $fields = [
            'Slogan',
            'Keterangan',
            'btn_masuk',
            'keunggulan_produk',
            'keterangan_keunggulan',
            'judul_pencapaian',
            'deskripsiPencapaian',
        ];

        foreach ($fields as $field) {
            $value = $request->input($field, '');

            Home::updateOrCreate(
                ['bahasa_id' => $bahasa, 'nama' => $field],
                ['isi' => $value ?: '-']
            );
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }
}
