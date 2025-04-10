<?php

namespace App\Http\Controllers\editor_halaman;

use App\Models\About;
use App\Models\Power;
use App\Models\Mission;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $bahasa = Language::all();

        $misi = Mission::where('bahasa_id', 1)->get();

        $kelebihan = Power::where('bahasa_id', 1)->get();

        $bahasa_id = 1;

        $data = About::where('bahasa_id', $bahasa_id)->pluck('isi', 'nama');

        return view('Page_Editor.Sections.tentang', compact('data', 'bahasa', 'bahasa_id', 'misi', 'kelebihan'));
    }

    public function switch($bahasaId)
    {
        $tentang = About::where('bahasa_id', $bahasaId)->pluck('isi', 'nama');
        $misi = Mission::where('bahasa_id', $bahasaId)->get();
        $keunggulan = Power::where('bahasa_id', $bahasaId)->get();

        if ($tentang->isEmpty()) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json([
            'tentang' => $tentang,
            'misi' => $misi,
            'keunggulan' => $keunggulan
        ]);
    }


    /**
     * Memperbarui data header (hanya bahasa default = 1).
     */
    public function update(Request $request, $bahasaId)
    {
        // Update
        $fields = [
            'judul_pendek' => '-',
            'judul_halaman' => '-',
            'deskripsi' => '-',
            'btn_login' => '-',
            'tentang_perusahaan' => '-',
            'keterangan_perusahaan' => '-',
            'visi_misi' => '-',
            'judul_visi' => '-',
            'isi_visi' => '-',
            'judul_ku' => '-',
        ];

        foreach ($fields as $field => $default) {
            $value = $request->input($field, $default);

            About::updateOrCreate(
                ['bahasa_id' => $bahasaId, 'nama' => $field],
                ['isi' => $value ?: $default]
            );
        }

        // Simpan misi baru
        $judulMisi = $request->input('misi_judul', []);
        $keteranganMisi = $request->input('misi_keterangan', []);

        foreach ($judulMisi as $index => $judul) {
            if (!empty($judul) || !empty($keteranganMisi[$index])) {
                Mission::updateOrCreate([
                    'judul' => $judul,
                    'keterangan' => $keteranganMisi[$index] ?? '',
                    'bahasa_id' => $bahasaId,
                ]);
            }
        }

        if ($request->has('keunggulan_judul')) {
            foreach ($request->keunggulan_judul as $index => $judul) {
                $keunggulanData = [
                    'judul' => $judul,
                    'isi' => $request->keunggulan_keterangan[$index] ?? '',
                    'bahasa_id' => $bahasaId,
                ];

                // Kalau ada file gambar keunggulan
                if ($request->hasFile("keunggulan_image.$index")) {
                    $file = $request->file("keunggulan_image.$index");

                    // Cek data lama biar bisa hapus gambar lama
                    $existing = Power::where('judul', $judul)
                        ->where('bahasa_id', $bahasaId)
                        ->first();

                    if ($existing && file_exists(public_path($existing->ikon))) {
                        unlink(public_path($existing->ikon)); // hapus gambar lama
                    }

                    $filename = 'adv_perusahaan' . time() . '_' . $index . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('images/keunggulan', $filename, 'public');
                    $keunggulanData['ikon'] = $path; // biar bisa diakses publik
                }

                Power::updateOrCreate(
                    ['judul' => $judul, 'bahasa_id' => $bahasaId],
                    $keunggulanData
                );
            }
        }

        return redirect()->back()->with('success', 'Tentang berhasil diperbarui!');
    }
}
