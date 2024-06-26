<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekomendasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pengguna.login');
});

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/saveRegister', [LoginController::class, 'saveRegister'])->name('saveRegister');

Route::get('/login', function () {
    return view('Pengguna.login');
})->name('login');

Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/beranda', [BeasiswaController::class, 'index_beasiswa'])->name('index_beasiswa');






Route::group(['middleware' => ['auth:mahasiswa', 'CekLevel:user']], function() {
    Route::get('/beranda', [BeasiswaController::class, 'index_beasiswa'])->name('index_beasiswa');
});
Route::group(['middleware' => ['auth:user', 'CekLevel:admin']], function() {
    Route::get('/berandaAdmin', [BeasiswaController::class, 'admin_beasiswa'])->name('admin_beasiswa');
});
Route::group(['middleware' => ['auth:mitra', 'CekLevel:mitra']], function() {
    Route::get('/berandaMitra', [BeasiswaController::class, 'mitra_beasiswa'])->name('mitra_beasiswa');
});

Route::get('/beranda/{beasiswa}', [BeasiswaController::class, 'show_beasiswa'])->name('show_beasiswa');

Route::group(['middleware' => ['auth:user', 'CekLevel:admin']], function() {
    Route::get('/page-one', [BerandaController::class, 'pageOne'])->name('pageOne');
    Route::get('/index_rekomendasi', [RekomendasiController::class, 'index_rekomendasi'])->name('index_rekomendasi');
    Route::post('/index_rekomendasi/{rekomendasi}', [RekomendasiController::class, 'confirm_rekomendasi'])->name('confirm_rekomendasi');
    Route::get('/data_mahasiswa', [BeasiswaController::class, 'show_user'])->name('show_user');
    
});

Route::group(['middleware' => ['auth:mahasiswa', 'CekLevel:user']], function() { 
    
    Route::get('/page-two', [BerandaController::class, 'pageTwo'])->name('pageTwo');
    Route::get('/profile_mahasiswa', [ProfileController::class, 'show_profileMHS'])->name('show_profileMHS');
    Route::patch('/profile_mahasiswa', [ProfileController::class, 'edit_profileMHS'])->name('edit_profileMHS');
    Route::get('/rekomendasi', [RekomendasiController::class, 'show_rekomendasi'])->name('show_rekomendasi');
    Route::post('/rekomendasi', [RekomendasiController::class, 'submit_rekomendasi'])->name('submit_rekomendasi');
    Route::get('/unggah_dokumen', [BeasiswaController::class, 'unggah_dokumen'])->name('unggah_dokumen');
    Route::post('/unggah_dokumen', [BeasiswaController::class, 'upload'])->name('upload');
    Route::get('/beranda/{beasiswa}/daftar_confirmation', [BeasiswaController::class, 'daftar_confirmation'])->name('daftar_confirmation');
    Route::post('/submit_registrasi/{beasiswa}', [BeasiswaController::class, 'submit_registrasi'])->name('submit_registrasi');
    Route::get('/kegiatanku', [BeasiswaController::class, 'show_kegiatanku'])->name('show_kegiatanku');
    
    
});

Route::group(['middleware' => ['auth:mitra', 'CekLevel:mitra']], function() {
    Route::get('/page-three', [BerandaController::class, 'pageThree'])->name('pageThree');
    Route::get('/page-three/create_beasiswa', [BeasiswaController::class, 'createBeasiswa'])->name('createBeasiswa');
    Route::post('/page-three/create_beasiswa', [BeasiswaController::class, 'simpanBeasiswa'])->name('simpanBeasiswa');
    Route::get('/my_beasiswa', [BeasiswaController::class, 'my_beasiswa'])->name('my_beasiswa');
    Route::delete('/my_beasiswa/{beasiswa}', [BeasiswaController::class, 'delete_beasiswa'])->name('delete_beasiswa');
    Route::get('my_beasiswa/{beasiswa}/edit', [BeasiswaController::class, 'edit_beasiswa'])->name('edit_beasiswa');
    Route::patch('/my_beasiswa/{beasiswa}/update', [BeasiswaController::class, 'update_beasiswa'])->name('update_beasiswa');
    Route::get('/acc_beasiswa', [BeasiswaController::class, 'acc_beasiswa'])->name('acc_beasiswa');
    Route::post('/confirm_beasiswa/{registrasi}', [BeasiswaController::class, 'confirm_beasiswa'])->name('confirm_beasiswa');
    
});

