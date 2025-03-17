<?php

namespace App\Http\Controllers\editor_halaman;

use App\Models\Language;
use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua bahasa
        $bahasa = Language::all();

        $bahasa_id = 1; // Bahasa yang dipilih

        $paket = Price::whereHas('features', function ($query) use ($bahasa_id) {
            $query->where('packages.bahasa_id', $bahasa_id);
        })->with([
                    'features' => function ($query) use ($bahasa_id) {
                        $query->where('packages.bahasa_id', $bahasa_id);
                    }
                ])->get();

        return view('Page_Editor.Sections.produk', compact('paket', 'bahasa', 'bahasa_id'));
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
