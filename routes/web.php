<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\editor_halaman\BerandaController;
use App\Http\Controllers\editor_halaman\ContactController;
use App\Http\Controllers\editor_halaman\FAQController;
use App\Http\Controllers\editor_halaman\HeaderController;
use App\Http\Controllers\editor_halaman\TnController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin', [AuthController::class, 'index'])->name('login');

Route::post('/cek_login', [AuthController::class, 'login'])->name('login.check');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/halaman_utama', function () {
    return view('home');
})->name('home');


Route::get('/manajemen_berita', function () {
    return view('Page.Berita.m_berita');
})->name('page.m_berita');

Route::get('/tambah_berita', function () {
    return view('Page.Berita.tambah_berita');
})->name('page.tambah_berita');

Route::get('/edit_berita', function () {
    return view('Page.Berita.edit');
})->name('page.edit_berita');


// Pengguna
Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna.index');

Route::post('/pengguna/store', [UserController::class, 'store'])->name('pengguna.store');

// Bahasa
Route::get('/bahasa', [LanguageController::class, 'index'])->name('bahasa.index');

Route::delete('/bahasa/{id}', [LanguageController::class, 'destroy'])->name('bahasa.destroy');

Route::get('/p_tambah_bahasa', function () {
    return view('Page.Bahasa.tambah_bahasa');
})->name('page.tambah_bahasa');

Route::post('/tambah_bahasa', [LanguageController::class, 'store'])->name('bahasa.store');

Route::put('/edit_bahasa/{id}', [LanguageController::class, 'update'])->name('bahasa.update');



// Editor

// Beranda
Route::get('/editor_beranda', [BerandaController::class, 'index'])->name('e_beranda.index');


// Header
Route::get('/editor_header', [HeaderController::class, 'index'])->name('header.index');

Route::get('/header/{bahasa_id}', [HeaderController::class, 'getHeaderByBahasa'])->name('header.bahasa');

Route::put('/update_header', [HeaderController::class, 'update'])->name('update.header');


// Footer
Route::get('/editor_footer', function () {
    return view('Page_Editor.Sections.footer');
})->name('editor.footer');

// FAQ
Route::get('/editor_faq', [FAQController::class, 'index'])->name('faq.index');

Route::get('/index_add', [FAQController::class, 'storeIndex'])->name('add_faq.index');

Route::post('/tambah_pertanyaan', [FAQController::class, 'store'])->name('faq.add');

Route::delete('/hapus_pertanyaan/{id}', [FAQController::class, 'destroy'])->name('faq.destroy');

Route::get('/edit_pertanyaan', function () {
    return view('Page_Editor.Sections.FAQ.edit_pertanyaan');
})->name('editor.edit_pertanyaan');



// Produk
Route::get('/editor_produk', function () {
    return view('Page_Editor.Sections.produk');
})->name('editor.produk');

// Tambah Paket
Route::get('/tambah_paket', function () {
    return view('Page_Editor.Sections.Produk.tambah_paket');
})->name('editor.paket');

// Edit Paket
Route::get('/edit_paket', function () {
    return view('Page_Editor.Sections.Produk.edit_paket');
})->name('editor.edit_paket');

// Hapus Paket



// Tentang
Route::get('/editor_tentang', function () {
    return view('Page_Editor.Sections.tentang');
})->name('editor.tentang');



// Kontak
Route::get('/editor_kontak', [ContactController::class, 'index'])->name('editor.kontak');

Route::put('/update-kontak/{bahasa}', [ContactController::class, 'update'])->name('update.kontak');

Route::get('/editor-halaman/kontak/{bahasaId}', [ContactController::class, 'getKontakByBahasa'])->name('kontak.bahasa');



// Syarat & Ketentuan
Route::get('/editor_s&k', [TnController::class, 'index']);

// Kebijakan Privasi
Route::get('/editor_kebijakan', function () {
    return view('Page_Editor.Sections.kebijakan');
})->name('editor.kebijakan');

