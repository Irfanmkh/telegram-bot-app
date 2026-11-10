<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [RegisterController::class, 'index'])->name('landing');
Route::post('/checkout', [RegisterController::class, 'process'])->name('checkout.process');
Route::get('/checkout/{invoice_number}', [RegisterController::class, 'show'])->name('checkout.show');
