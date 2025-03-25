<?php

namespace App\Http\Controllers\editor_halaman;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $bahasa = Language::all();

        $bahasa_id = 1;

        $data = About::where('bahasa_id', $bahasa_id)->pluck('isi', 'nama');

        return view('Page_Editor.Sections.tentang', compact('data', 'bahasa', 'bahasa_id'));
    }

    public function switch($bahasaId)
    {
        $tentang = About::where('bahasa_id', $bahasaId)->pluck('isi', 'nama');

        if ($tentang->isEmpty()) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($tentang);
    }

    /**
     * Memperbarui data header (hanya bahasa default = 1).
     */
    public function update(Request $request, $bahasaId)
    {
        // Update
        $fields = [
            'judul_pendek' => '-',
            'judul_halaman' => '-',
            'deskripsi' => '-',
            'btn_login' => '-',
            'tentang_perusahaan' => '-',
            'keterangan_perusahaan' => '-',
            'visi_misi' => '-',
            'judul_visi' => '-',
            'isi_visi' => '-',
            'judul_ku' => '-',
        ];

        foreach ($fields as $field => $default) {
            $value = $request->input($field, $default);

            About::updateOrCreate(
                ['bahasa_id' => $bahasaId, 'nama' => $field],
                ['isi' => $value ?: $default]
            );
        }

        return redirect()->back()->with('success', 'Tentang berhasil diperbarui!');
    }
}
