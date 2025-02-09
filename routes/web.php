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
    return view('Page_Editor.editor_halaman'); // Sesuaikan nama file Blade Anda
})->name('editor.halaman');
