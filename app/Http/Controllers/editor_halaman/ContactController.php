<?php

namespace App\Http\Controllers\editor_halaman;

use App\Models\Contact;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua bahasa
        $bahasa = Language::all();

        // Ambil data kontak dengan bahasa default (misalnya bahasa dengan ID 1)
        $data = Contact::where('bahasa_id', 1)
            ->pluck('isi', 'nama');

        $bahasa_id = 1;

        return view('Page_Editor.Sections.kontak', compact('data', 'bahasa', 'bahasa_id'));
    }

    public function switch($bahasaId)
    {
        // Ambil data berdasarkan bahasa_id
        $kontak = Contact::where('bahasa_id', $bahasaId)->pluck('isi', 'nama');

        // Cek apakah data ditemukan
        if ($kontak->isEmpty()) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($kontak);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $bahasa)
    {
        $fields = ['Judul', 'IFrame', 'Subjudul', 'Keterangan', 'Alamat', 'Telepon', 'Email'];

        foreach ($fields as $field) {
            $value = $request->input(strtolower($field), ''); // Ambil input atau kosong

            Contact::updateOrCreate(
                ['bahasa_id' => $bahasa, 'nama' => $field],
                ['isi' => $value ?: '-']
            );
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }
}
