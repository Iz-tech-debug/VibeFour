<?php

namespace App\Http\Controllers\editor_halaman;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FAQ;

class FAQController extends Controller
{
    //

    public function index()
    {
        // Data + index
        $bahasa = Language::all();

        $data = FAQ::where('bahasa_id', 1)->get();

        return view('Page_Editor.Sections.faq', compact('bahasa', 'data'));
    }

    public function store(Request $request)
    {
        // dd($request->all()); // Debugging

        $request->validate([
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string',
            'bahasa_id' => 'required|exists:languages,id',
        ]);

        // Masukkan data kedalam tabel FAQ
        $faq = new FAQ();

        $faq->pertanyaan = $request->pertanyaan;
        $faq->jawaban = $request->jawaban;
        $faq->bahasa_id = $request->bahasa_id;

        $faq->save();

        return redirect()->route('faq.index')->with('success', 'FAQ berhasil ditambahkan!');
    }

    public function switch(Request $request)
    {

    }

    public function storeIndex()
    {
        // Data + index
        $bahasa = Language::all();

        return view('Page_Editor.Sections.FAQ.tambah_pertanyaan', compact('bahasa'));
    }

    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();

        return response()->json(['success' => 'FAQ berhasil dihapus!']); // Pastikan ini JSON
    }

}
