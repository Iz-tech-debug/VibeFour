<?php

namespace App\Http\Controllers\editor_halaman;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Footer;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Index
        $bahasa = Language::all();
        $bahasa_id = 1;

        $data = Footer::where('bahasa_id', $bahasa_id)
            ->pluck('isi', 'nama');

        return view('Page_Editor.Sections.footer', compact('data', 'bahasa', 'bahasa_id'));
    }

    // Switch untuk bahasa
    public function switch($bahasaId)
    {
        $footer = Footer::where('bahasa_id', $bahasaId)->pluck('isi', 'nama');

        if ($footer->isEmpty()) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($footer);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $bahasaId)
    {
        // Update
        $fields = [
            'Alamat' => '-',
            'NomorWA' => '-',
            'NomorCS' => '-',
            'Judul_Produk' => '-',
            'Produk_voting' => '-',
            'Produk_penjadwalan' => '-',
            'Perusahaan' => '-',
            'Tentang' => '-',
            'Kontak' => '-',
            'Berita' => '-',
            'Syarat_Ketentuan' => '-',
            'Kebijakan_Privasi' => '-',
            'FAQ' => '-'
        ];

        foreach ($fields as $field => $default) {
            $value = $request->input($field, $default);

            Footer::updateOrCreate(
                ['bahasa_id' => $bahasaId, 'nama' => $field],
                ['isi' => $value ?: $default]
            );
        }

        return redirect()->back()->with('success', 'Footer berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
