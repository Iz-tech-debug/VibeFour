<?php

namespace App\Http\Controllers\editor_halaman;

use App\Models\TNC;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TnController extends Controller
{
    //

    public function index()
    {
        $bahasa = Language::all();
        $bahasa_id = 1;

        $data = TNC::where('bahasa_id', $bahasa_id)
            ->pluck('isi', 'nama');

        return view('Page_Editor.Sections.s&k', compact('data', 'bahasa', 'bahasa_id'));
    }

    // Ubah bahasa
    public function switch($bahasaId)
    {
        $tnc = TNC::where('bahasa_id', $bahasaId)->pluck('isi', 'nama');

        if ($tnc->isEmpty()) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($tnc);
    }

    public function update(Request $request, $bahasaId)
    {
        $fields = ['Judul', 'Keterangan', 'Isi'];

        foreach ($fields as $field) {
            $value = $request->input(strtolower($field), ''); // Ambil input atau kosong

            TNC::updateOrCreate(
                ['bahasa_id' => $bahasaId, 'nama' => $field],
                ['isi' => $value ?: '-']
            );
        }

        return redirect()->back()->with('success', 'Syarat & Ketentuan berhasil diperbarui!');
    }

}
