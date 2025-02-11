<?php

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

Route::get('/', function () {
    return view('Auth.login');
});

Route::get('/dashboard', function () {
    return view('home');
});


// Route::get('/editor_halaman', function () {
//     return view('Page_Editor.editor_halaman');
// });

// Pindah atau ambil data dari editor halaman
Route::get('/editor_halaman', function () {
    return view('Page_Editor.editor_halaman');
})->name('editor.halaman');

Route::get('/manajemen_berita', function () {
    return view('Page.m_berita');
})->name('page.m_berita');

Route::get('/manajemen_pengguna', function () {
    return view('Page.m_pengguna');
})->name('page.m_pengguna');
