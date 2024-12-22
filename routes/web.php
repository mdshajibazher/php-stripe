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

Route::get('/', [\App\Http\Controllers\StripeController::class, 'index']);
Route::post('/checkout', [\App\Http\Controllers\StripeController::class, 'checkout'])->name('checkout');
Route::get('/success', [\App\Http\Controllers\StripeController::class, 'success'])->name('success');
Route::get('/cancel', [\App\Http\Controllers\StripeController::class, 'cancel'])->name('cancel');
