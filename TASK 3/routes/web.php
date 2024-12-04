<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\tabelSantriController;


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
    return view('welcome');
});

Route::get('/salam', function () {
    return "Assalamuálaykum, Selamat Belajar Laravel PeTIK II Jombang Angkatan III";
});


// Routing Parameter
Route::get('/pegawai/{nama}/{divisi}', function ($nama,$divisi) {
    return 'Nama Pegawai: '.$nama.'<br/>Department: '.$divisi;
});

//Routing view kondisi
Route::get('/kabar', function () {
    return view('kondisi');
});

//Routing view kondisi
Route::get('/santri', [SantriController::class, 'datasantri']
);

//Routing view kondisi
Route::get('/data_mahasantri', [tabelSantriController::class, 'tabelsantri']
);