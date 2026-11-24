<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/layanan', 'services.index')->name('services.index');
Route::view('/pengaduan', 'complaints.index')->name('complaints.index');
Route::view('/apbdes', 'transparency.apbdes')->name('transparency.apbdes');
Route::view('/statistik', 'transparency.stats')->name('transparency.stats');