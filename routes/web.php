<?php

use Illuminate\Support\Facades\Route;

// import controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ArtikelController;

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

Route::get('/', [DashboardController::class, 'index']);

// route untuk sesi 2
Route::get('/sesi-2', function () {
    return view('sesi-2', [
        'nama_siswa'  => 'Rizky',
        'umur'  => 17,
        'kelas' => 'XII RPL 1',
        'mata_pelajaran' => ['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'Produktif RPL', 'Produktif TKJ']
    ]);
});

Route::get('/contoh/{nama}', function ($nama) {
    // mereturn view dan mengirimkan data nama
    return view('bootstrap', [
        'nama' => $nama
    ]);
});

// route untuk home controller
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);

// route untuk dashboard controller
Route::resource('/user/dashboard', DashboardController::class);

// route untuk admin artikel controller
Route::resource('/admin/artikel', ArtikelController::class);

Route::get('/admin/artikel/{id}', 'ArtikelController@show');
Route::put('/admin/artikel/{artikel}', 'ArtikelController@update')->name('artikel.update');


