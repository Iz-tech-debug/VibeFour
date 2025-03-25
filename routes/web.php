<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\editor_halaman\AboutController;
use App\Http\Controllers\editor_halaman\BerandaController;
use App\Http\Controllers\editor_halaman\ContactController;
use App\Http\Controllers\editor_halaman\FAQController;
use App\Http\Controllers\editor_halaman\FooterController;
use App\Http\Controllers\editor_halaman\HeaderController;
use App\Http\Controllers\editor_halaman\PrivacyController;
use App\Http\Controllers\editor_halaman\ProductController;
use App\Http\Controllers\editor_halaman\TnController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Models\Privacy;
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


// Berita
Route::get('/manajemen_berita', [NewsController::class, 'index'])->name('page.m_berita');

Route::get('/tambah_berita', [NewsController::class, 'news'])->name('page.tambah_berita');

Route::post('/add_berita', [NewsController::class, 'store'])->name('add.berita');

Route::delete('/berita/{id}', [NewsController::class, 'destroy'])->name('berita.destroy');

Route::get('/edit_berita/{id}', [NewsController::class, 'edit'])->name('page.edit_berita');

Route::put('/berita/{id}', [NewsController::class, 'update'])->name('berita.update');



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

Route::get('/editor_halaman/beranda/{bahasaId}', [BerandaController::class, 'switch'])->name('beranda.bahasa');

Route::put('/update_beranda/{bahasaId}', [BerandaController::class, 'update'])->name('update.beranda');





// Header
Route::get('/editor_header', [HeaderController::class, 'index'])->name('header.index');

Route::get('/editor_halaman/header/{bahasaId}', [HeaderController::class, 'switch'])->name('header.bahasa');

Route::put('/update_header/{bahasaId}', [HeaderController::class, 'update'])->name('update.header');


// Footer
Route::get('/editor_footer', [FooterController::class, 'index'])->name('footer.index');

Route::get('/editor_halaman/footer/{bahasaId}', [FooterController::class, 'switch'])->name('footer.bahasa');

Route::put('/update_footer/{bahasa}', [FooterController::class, 'update'])->name('update.footer');


// FAQ
Route::get('/editor_faq', [FAQController::class, 'index'])->name('faq.index');

Route::get('/index_add', [FAQController::class, 'storeIndex'])->name('add_faq.index');

Route::post('/tambah_pertanyaan', [FAQController::class, 'store'])->name('faq.add');

Route::delete('/hapus_pertanyaan/{id}', [FAQController::class, 'destroy'])->name('faq.destroy');

Route::get('/edit_pertanyaan', function () {
    return view('Page_Editor.Sections.FAQ.edit_pertanyaan');
})->name('editor.edit_pertanyaan');



// Voting
Route::get('/editor_voting', [ProductController::class, 'Voting'])->name('voting.index');

Route::put('/update_voting/{bahasa}', [ProductController::class, 'storeVote'])->name('update.voting');

Route::get('/editor_halaman/voting/{bahasaId}', [ProductController::class, 'switchVote'])->name('vote.bahasa');



// Penjadwalan
Route::get('/editor_penjadwalan', [ProductController::class, 'Penjadwalan'])->name('penjadwalan.index');

Route::put('/update_penjadwalan/{bahasa}', [ProductController::class, 'storePenjadwalan'])->name('update.penjadwalan');

Route::get('/editor_halaman/penjadwalan/{bahasaId}', [ProductController::class, 'switchPenjadwalan'])->name('penjadwalan.bahasa');




// Paket berlangganan / Biaya index
Route::get('/editor_biaya', [ProductController::class, 'Paket'])->name('biaya.index');

Route::get('/tambah_paket', [ProductController::class, 'inputPaket'])->name('editor.paket');

Route::post('/add_paket', [ProductController::class, 'addPaket'])->name('paket.add');

Route::put('/update_paket/{id}', [ProductController::class, 'updatePaket'])->name('update.paket');

Route::delete('/hapus_paket/{id}', [ProductController::class, 'destroyPaket'])->name('delete.paket');

Route::get('/edit_paket', function () {
    return view('Page_Editor.Sections.Produk.edit_paket');
})->name('editor.edit_paket');


// Tentang
Route::get('/editor_tentang', [AboutController::class, 'index'])->name('tentang.index');

Route::put('/update_tentang/{bahasa}', [AboutController::class, 'update'])->name('update.tentang');

Route::get('/editor-halaman/tentang/{bahasaId}', [AboutController::class, 'switch'])->name('tentang.bahasa');


// Kontak
Route::get('/editor_kontak', [ContactController::class, 'index'])->name('editor.kontak');

Route::put('/update_kontak/{bahasa}', [ContactController::class, 'update'])->name('update.kontak');

Route::get('/editor-halaman/kontak/{bahasaId}', [ContactController::class, 'switch'])->name('kontak.bahasa');


// Syarat & Ketentuan
Route::get('/editor_tnc', [TnController::class, 'index'])->name('editor.tnc');

Route::get('/editor_halaman/tnc/{bahasaId}', [TnController::class, 'switch'])->name('tnc.bahasa');

Route::put('/update_tnc/{bahasa}', [TnController::class, 'update'])->name('update.tnc');


// Kebijakan Privasi
Route::get('/editor_privacy', [PrivacyController::class, 'index'])->name('editor.privacy');

Route::get('/editor_halaman/privacy/{bahasaId}', [PrivacyController::class, 'switch'])->name('privacy.bahasa');

Route::put('/update_privacy/{bahasa}', [PrivacyController::class, 'update'])->name('update.privacy');
