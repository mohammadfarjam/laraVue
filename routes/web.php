<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



//Route::get('/{any}', function () {
//    return view('welcome');
//})->where('any','.*');







 Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/namayesh', [App\Http\Controllers\AmarController::class, 'namayesh'])->name('namayesh');
// Route::get('namayesh/amar', [App\Http\Controllers\AmarController::class, 'getAmar'])->name('amar');
//
// Route::get('{path}',[HomeController::class,'index'])->where('path','([A-z\d\-\/_.]+)?');

// Auth::routes();
//
 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
