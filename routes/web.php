<?php

use App\Http\Controllers\clubController;
use App\Http\Controllers\divisiController;
use App\Http\Controllers\jabatanController;
use App\Http\Controllers\karyawanController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('pages.dashboard');
});
// Route::get('/club', function () {
//     return view('clubs.index');
// });
Route::resource('/club', clubController::class);
Route::resource('/divisi', divisiController::class);
Route::resource('/jabatan', jabatanController::class);
Route::resource('/karyawan', karyawanController::class);

// Route::get('club', 'clubController@index');


// Route::get('/divisi', function () {
//     return view('divisis.index');
// });
// Route::get('/jabatan', function () {
//     return view('jabatans.index');
// });
// Route::get('/karyawan', function () {
//     return view('karyawans.index');
// });
