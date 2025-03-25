<?php

namespace App\Http\Controllers\editor_halaman;

use App\Http\Controllers\Controller;
use App\Models\Header;
use App\Models\Language;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        $bahasa = Language::all();
        $bahasa_id = 1;
        $data = Header::where('bahasa_id', $bahasa_id)->pluck('isi', 'nama');

        return view('Page_Editor.Sections.header', compact('data', 'bahasa', 'bahasa_id'));
    }

    public function switch($bahasaId)
    {
        $header = Header::where('bahasa_id', $bahasaId)->pluck('isi', 'nama');

        if ($header->isEmpty()) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($header);
    }

    /**
     * Memperbarui data header (hanya bahasa default = 1).
     */
    public function update(Request $request, $bahasaId)
    {
        // Update
        $fields = [
            'Beranda' => '-',
            'Tentang' => '-',
            'Kontak' => '-',
            'Produk' => '-',
            'Produk Voting' => '-',
            'Produk Penjadwalan' => '-',
            'Teks Masuk' => '-',
        ];

        foreach ($fields as $field => $default) {
            $value = $request->input($field, $default);

            Header::updateOrCreate(
                ['bahasa_id' => $bahasaId, 'nama' => $field],
                ['isi' => $value ?: $default]
            );
        }

        return redirect()->back()->with('success', 'Header berhasil diperbarui!');
    }
}
