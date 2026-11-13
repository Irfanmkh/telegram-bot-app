<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TelegramWebhookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});
Route::get('/about-us', function () {
    return view('about-us');
});


Route::get('/visi-misi', function () {
    return view('visi-misi');
});
Route::get('/register', function () {
    return view('regist');
});


Route::get('/register', [RegisterController::class, 'index'])->name('regist');
Route::post('/checkout', [RegisterController::class, 'process'])->name('checkout.process');
Route::get('/checkout/{invoice_number}', [RegisterController::class, 'show'])->name('checkout.show');
Route::post('/telegram/webhook', [TelegramWebhookController::class, 'handle'])->name('telegram.webhook');
