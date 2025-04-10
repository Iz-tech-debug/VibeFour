<?php

namespace App\Http\Controllers\editor_halaman;

use Log;
use App\Models\Home;
use App\Models\Product;
use App\Models\Language;
use App\Models\Advantage;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
{
    public function index()
    {
        // View + data
        $bahasa = Language::all();

        $produk = Product::where('nama', 'beranda')->first();

        $keunggulan = Advantage::where('bahasa_id', 1)->get();

        $achievements = Achievement::where('bahasa_id', 1)->get();

        // Ambil data kontak dengan bahasa default (misalnya bahasa dengan ID 1)
        $data = Home::where('bahasa_id', 1)
            ->pluck('isi', 'nama');

        $bahasa_id = 1;

        return view('Page_Editor.Sections.beranda', compact('data', 'bahasa', 'bahasa_id', 'produk', 'keunggulan', 'achievements'));
    }

    public function switch($bahasaId)
    {
        $beranda = Home::where('bahasa_id', $bahasaId)->pluck('isi', 'nama');

        $keunggulan = Advantage::where('bahasa_id', $bahasaId)->get();

        $achievements = Achievement::where('bahasa_id', $bahasaId)->get();

        if ($beranda->isEmpty()) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json([
            'beranda' => $beranda,
            'keunggulan' => $keunggulan,
            'achievements' => $achievements
        ]);
    }


    public function update(Request $request, $bahasa)
    {
        $fields = [
            'Slogan',
            'Keterangan',
            'btn_masuk',
            'keunggulan_produk',
            'keterangan_keunggulan',
            'judul_pencapaian',
            'deskripsiPencapaian',
        ];

        $data = ['nama' => 'beranda'];

        if ($request->hasFile('foto_produk')) {
            $file = $request->file('foto_produk');
            $filenameToStore = 'beranda' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/product', $filenameToStore, 'public');
            $data['gambar'] = $path;
        }

        Product::updateOrCreate(['nama' => 'beranda'], $data);

        foreach ($fields as $field) {
            $value = $request->input($field, '');

            Home::updateOrCreate(
                ['bahasa_id' => $bahasa, 'nama' => $field],
                ['isi' => $value ?: '-']
            );
        }

        if ($request->has('judul_keunggulan')) {
            foreach ($request->input('judul_keunggulan') as $index => $judul) {
                // Default data
                $data = [
                    'judul' => $judul,
                    'isi' => $request->input('Keterangan_keunggulan')[$index] ?? '-',
                    'bahasa_id' => $bahasa,
                ];

                // Kalau ada file yang diupload
                if ($request->hasFile("keunggulan_image.$index")) {
                    $file = $request->file("keunggulan_image.$index");
                    $filename = 'adv_beranda' . time() . '_' . $index . '.' . $file->getClientOriginalExtension();
                    $ikonPath = $file->storeAs('images/keunggulan', $filename, 'public');
                    $data['ikon'] = $ikonPath;
                }

                // Simpan atau update
                Advantage::updateOrCreate(
                    ['judul' => $judul, 'bahasa_id' => $bahasa],
                    $data
                );
            }
        }

        // Simpan pencapaian
        if ($request->has('pencapaian_judul')) {
            foreach ($request->input('pencapaian_judul') as $index => $judul) {
                $data = [
                    'nama' => $judul,
                    'isi' => $request->input('pencapaian_keterangan')[$index] ?? '-',
                    'bahasa_id' => $bahasa,
                ];

                if ($request->hasFile("pencapaian_image.$index")) {
                    $file = $request->file("pencapaian_image.$index"); // Perbaikan di sini
                    $filename = 'achv_' . time() . '_' . $index . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('images/pencapaian', $filename, 'public');
                    $data['ikon'] = $path;
                }

                Achievement::updateOrCreate(
                    ['nama' => $judul, 'bahasa_id' => $bahasa],
                    $data
                );
            }
        }


        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function HapusKeunggulan(Request $request)
    {
        $id = $request->id;

        try {
            $data = Advantage::findOrFail($id);

            if ($data->ikon && Storage::exists('public/' . $data->ikon)) {
                Storage::delete('public/' . $data->ikon);
            }

            $data->delete();

            return response()->json(['status' => 'success', 'message' => 'Keunggulan berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Gagal menghapus keunggulan']);
        }
    }


    public function HapusPencapaian(Request $request)
    {
        $id = $request->id;

        try {
            $data = Achievement::findOrFail($id);

            if ($data->ikon && Storage::exists('public/' . $data->ikon)) {
                Storage::delete('public/' . $data->ikon);
            }

            $data->delete();

            return response()->json(['status' => 'success', 'message' => 'Pencapaian berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Gagal menghapus pencapaian']);
        }
    }
}
