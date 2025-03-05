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

    public function getKontakByBahasa($bahasa_id)
    {
        // Ambil data kontak sesuai bahasa yang dipilih
        $data = Contact::where('bahasa_id', $bahasa_id)
            ->pluck('isi', 'nama');

        return response()->json($data);
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
    public function update(Request $request)
    {
        $bahasa_id = 1;

        $fields = ['Judul', 'IFrame', 'Subjudul', 'Keterangan', 'Alamat', 'Telepon', 'Email'];

        foreach ($fields as $field) {
            $value = $request->input(strtolower($field), ''); // Default ke string kosong jika null

            Contact::updateOrCreate(
                ['bahasa_id' => $bahasa_id, 'nama' => $field],
                ['isi' => $value ?: '-']
            );
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
