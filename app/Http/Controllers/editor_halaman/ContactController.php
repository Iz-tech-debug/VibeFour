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
    public function update(Request $request, string $bahasa_id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'iframe' => 'required|string',
            'subjudul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $kontak = Contact::where('id_bahasa', $bahasa_id)->firstOrFail();

        $kontak->update([
            'judul' => $request->judul,
            'iframe' => $request->iframe,
            'subjudul' => $request->subjudul,
            'keterangan' => $request->keterangan,
            'alamat' => $request->alamat,
            'telepon' => $request->no_telp,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Data kontak berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
