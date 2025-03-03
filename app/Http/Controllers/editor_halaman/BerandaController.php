<?php

namespace App\Http\Controllers\editor_halaman;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    // Index editor beranda
    public function index()
    {
        // View + data
        $data = Language::all();

        return view('Page_Editor.Sections.beranda', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
