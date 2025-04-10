<?php

namespace App\Http\Controllers\editor_halaman;

use Log;
use App\Models\Vote;
use App\Models\Price;
use App\Models\Feature;
use App\Models\Package;
use App\Models\Product;
use App\Models\Language;
use App\Models\Schedule;
use App\Models\Advantage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AdvantageProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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


    // Paket

    public function Paket()
    {
        $lang = Language::all();

        $bahasa_id = 1;

        $paket = Price::whereHas('features', function ($query) use ($bahasa_id) {
            $query->where('packages.bahasa_id', $bahasa_id);
        })->with([
                    'features' => function ($query) use ($bahasa_id) {
                        $query->where('packages.bahasa_id', $bahasa_id);
                    }
                ])->get();

        return view('Page_Editor.Sections.Produk.biaya', compact('lang', 'paket'));
    }

    public function switchPaket($bahasaId)
    {

    }

    public function inputPaket()
    {
        $lang = Language::all();

        return view('Page_Editor.Sections.Produk.tambah_paket', compact('lang'));
    }

    public function addPaket(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga' => 'nullable|numeric',
            'durasi' => 'required|integer',
            'periode' => 'required|string',
            'fitur' => 'required|array',
            'fitur.*' => 'string|max:255',
            'pilihBahasa' => 'required|exists:languages,id',
        ]);

        // Simpan harga ke tabel prices
        $biaya = new Price();
        $biaya->nama = $request->nama_paket;
        $biaya->harga = $request->harga;
        $biaya->durasi = $request->durasi;
        $biaya->satuan_waktu = $request->periode;
        $biaya->save(); // Simpan dulu agar ID tersedia

        // Simpan fitur satu per satu dan ambil ID fitur pertama
        $featureIds = [];
        foreach ($request->fitur as $namaFitur) {
            $fitur = Feature::create(['fitur' => $namaFitur]); // Simpan fitur
            $featureIds[] = $fitur->id;
        }

        // Ambil fitur pertama sebagai default untuk packages
        $firstFeatureId = $featureIds[0] ?? null;

        // Simpan paket ke tabel packages (pastikan feature_id tidak kosong)
        if ($firstFeatureId) {
            $paket = new Package();
            $paket->bahasa_id = $request->pilihBahasa;
            $paket->price_id = $biaya->id;
            $paket->feature_id = $firstFeatureId; // Isi dengan fitur pertama
            $paket->save();
        }

        return redirect()->back()->with('success', 'Paket berhasil ditambahkan!');
    }

    public function updatePaket(Request $request, $id)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'durasi' => 'required|integer',
            'periode' => 'required|string',
        ]);

        $paket = Price::findOrFail($id);
        $paket->nama = $request->nama_paket;
        $paket->harga = $request->harga;
        $paket->durasi = $request->durasi;
        $paket->satuan_waktu = $request->periode;
        $paket->save();

        return redirect()->back()->with('success', 'Paket berhasil diperbarui!');
    }

    public function destroyPaket($id)
    {
        $paket = Package::findOrFail($id);
        $paket = Price::findOrFail($paket->price_id);
        $paket = Feature::findOrFail($paket->id);

        $paket->delete();

        return response()->json(['success' => 'Paket berhasil dihapus!']);
    }


    // Voting
    public function Voting()
    {
        $lang = Language::all();

        $advantages = AdvantageProduct::where('bahasa_id', 1)->where('produk', 'vote')->get();


        $produk = Product::where('nama', 'vote')->first();

        $data = Vote::where('bahasa_id', 1)
            ->pluck('isi', 'nama');

        // Ambil data kontak dengan bahasa default (misalnya bahasa dengan ID 1)
        $bahasa_id = 1;

        return view('Page_Editor.Sections.Produk.voting', compact('lang', 'bahasa_id', 'data', 'advantages', 'produk'));
    }

    public function storeVote(Request $request, $bahasa)
    {
        $fields = ['Judul', 'Deskripsi', 'TeksButtonCoba', 'TeksButtonTutorial', 'Link', 'JudulBagianKeunggulan', 'KeteranganBagianKeunggulan'];

        $data = ['nama' => 'vote'];

        // Cek apakah ada gambar baru
        if ($request->hasFile('foto_produk')) {
            $file = $request->file('foto_produk');
            $filenameToStore = 'vote' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/product', $filenameToStore, 'public');
            $data['gambar'] = $path;
        }

        Product::updateOrCreate(['nama' => 'vote'], $data);

        foreach ($fields as $field) {
            $value = $request->input($field, '');

            Vote::updateOrCreate(
                ['bahasa_id' => $bahasa, 'nama' => $field],
                ['isi' => $value ?: '-']
            );
        }

        if ($request->has('keunggulanV_judul')) {
            foreach ($request->keunggulanV_judul as $index => $judul) {
                $keunggulanData = [
                    'nama' => $judul,
                    'isi' => $request->keunggulanV_keterangan[$index] ?? '',
                    'bahasa_id' => $bahasa,
                    'produk' => 'vote',
                ];

                // Jika ada ikon yang diunggah
                if ($request->hasFile("keunggulanV_image.$index")) {
                    $file = $request->file("keunggulanV_image.$index");
                    $filenameToStore = 'keunggulan_' . time() . '_' . $index . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('images/advantages', $filenameToStore, 'public');
                    $keunggulanData['ikon'] = $path;
                }

                // Simpan atau update keunggulan
                AdvantageProduct::updateOrCreate(
                    ['nama' => $judul, 'bahasa_id' => $bahasa],
                    $keunggulanData
                );
            }
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function switchVote($bahasaId)
    {
        // Ambil data berdasarkan bahasa_id
        $vote = Vote::where('bahasa_id', $bahasaId)->pluck('isi', 'nama');

        // Ambil keunggulan berdasarkan bahasa_id
        $keunggulan = Advantage::where('bahasa_id', $bahasaId)->get(['id', 'ikon', 'nama', 'isi']);

        // Cek apakah data ditemukan
        if ($vote->isEmpty() && $keunggulan->isEmpty()) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        // Return response dalam format JSON
        return response()->json([
            'vote' => $vote,
            'keunggulan' => $keunggulan
        ]);
    }

    // Penjadwalan
    public function Penjadwalan()
    {
        $lang = Language::all();

        $produk = Product::where('nama', 'penjadwalan')->first();

        $advantages = AdvantageProduct::where('bahasa_id', 1)->where('produk', 'penjadwalan')->get();

        $data = Schedule::where('bahasa_id', 1)
            ->pluck('isi', 'nama');

        $bahasa_id = 1;

        return view('Page_Editor.Sections.Produk.penjadwalan', compact('lang', 'bahasa_id', 'data', 'advantages', 'produk'));
    }


    public function switchPenjadwalan($bahasaId)
    {
        // Ambil data berdasarkan bahasa_id
        $schedule = Schedule::where('bahasa_id', $bahasaId)->pluck('isi', 'nama');

        $advantages = AdvantageProduct::where('bahasa_id', $bahasaId)->where('produk', 'penjadwalan')->get();

        if ($schedule->isEmpty() && $advantages->isEmpty()) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
        $scheduleData = $schedule->toArray();

        return response()->json(array_merge($scheduleData, [
            'keunggulan' => $advantages
        ]));
    }


    public function storePenjadwalan(Request $request, $bahasa)
    {
        // dd($request->all());

        $fields = ['Judul', 'Deskripsi', 'TeksButtonCoba', 'TeksButtonTutorial', 'Link', 'JudulBagianKeunggulan', 'KeteranganBagianKeunggulan'];

        $data = ['nama' => 'penjadwalan'];

        if ($request->hasFile('foto_produk')) {
            $file = $request->file('foto_produk');
            $filenameToStore = 'penjadwalan' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/product', $filenameToStore, 'public');
            $data['gambar'] = $path;
        }

        Product::updateOrCreate(['nama' => 'penjadwalan'], $data);

        if ($request->has('keunggulanV_judul')) {
            foreach ($request->keunggulanV_judul as $index => $judul) {
                $keunggulanData = [
                    'nama' => $judul,
                    'isi' => $request->keunggulanV_keterangan[$index] ?? '',
                    'bahasa_id' => $bahasa,
                    'produk' => 'penjadwalan',
                ];

                // Jika ada ikon yang diunggah
                if ($request->hasFile("keunggulanV_image.$index")) {
                    $file = $request->file("keunggulanV_image.$index");
                    $filenameToStore = 'keunggulan_' . time() . '_' . $index . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('images/advantages', $filenameToStore, 'public');
                    $keunggulanData['ikon'] = $path;
                }

                // Simpan atau update keunggulan
                AdvantageProduct::updateOrCreate(
                    ['nama' => $judul, 'bahasa_id' => $bahasa],
                    $keunggulanData
                );
            }
        }

        foreach ($fields as $field) {
            $value = $request->input($field, '');

            Schedule::updateOrCreate(
                ['bahasa_id' => $bahasa, 'nama' => $field],
                ['isi' => $value ?: '-']
            );
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function HapusKeunggulan(Request $request)
    {
        $id = $request->id;

        try {
            $keunggulan = AdvantageProduct::findOrFail($id);

            // Hapus file ikon kalau ada
            if ($keunggulan->ikon && Storage::exists('public/' . $keunggulan->ikon)) {
                Storage::delete('public/' . $keunggulan->ikon);
            }

            $keunggulan->delete();

            return response()->json(['status' => 'success', 'message' => 'Keunggulan berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Gagal menghapus keunggulan']);
        }
    }


}
