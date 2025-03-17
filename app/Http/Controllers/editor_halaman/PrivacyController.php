<?php

namespace App\Http\Controllers\editor_halaman;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Privacy;

class PrivacyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Index
        $bahasa = Language::all();
        $bahasa_id = 1;

        $data = Privacy::where('bahasa_id', $bahasa_id)
            ->pluck('isi', 'nama');

        return view('Page_Editor.Sections.kebijakan', compact('data', 'bahasa', 'bahasa_id'));
    }

    // Switch untuk bahasa
    public function switch($bahasaId)
    {
        $privacy = Privacy::where('bahasa_id', $bahasaId)->pluck('isi', 'nama');

        if ($privacy->isEmpty()) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($privacy);
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
        //

        $fields = ['Judul', 'Keterangan', 'Isi'];

        foreach ($fields as $field) {
            $value = $request->input(strtolower($field), '');

            Privacy::updateOrCreate(
                ['bahasa_id' => $bahasaId, 'nama' => $field],
                ['isi' => $value ?: '-']
            );
        }

        return redirect()->back()->with('success', 'Kebijakan Privasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
