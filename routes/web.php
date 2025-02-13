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

Route::get('/halaman_utama', function () {
    return view('home');
});


Route::get('/manajemen_berita', function () {
    return view('Page.m_berita');
})->name('page.m_berita');

Route::get('/manajemen_pengguna', function () {
    return view('Page.m_pengguna');
})->name('page.m_pengguna');


// Editor

// Beranda
Route::get('/editor_beranda', function () {
    return view('Page_Editor.Sections.beranda');
})->name('editor.beranda');

// Header
Route::get('/editor_header', function () {
    return view('Page_Editor.Sections.header');
})->name('editor.header');


// Footer
Route::get('/editor_footer', function () {
    return view('Page_Editor.Sections.footer');
})->name('editor.footer');

