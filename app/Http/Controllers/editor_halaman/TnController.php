<?php

namespace App\Http\Controllers\editor_halaman;

use App\Http\Controllers\Controller;
use App\Models\TNC;
use Illuminate\Http\Request;

class TnController extends Controller
{
    //

    public function index()
    {
        // Index + data

        $snk = TNC::all();

        return view('Page_Editor.Sections.s&k', compact('snk'));
    }
}
