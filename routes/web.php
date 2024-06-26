<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homepage'])->name('home');
Route::get('/motor/{id}', [HomeController::class, 'listMotor'])->name('listMotor');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/order/payment', [OrderController::class, 'getPaymentMethod'])
            ->name('order.payment');
    Route::resource('/order', OrderController::class);
    Route::get('/order/{id}/bayar', [OrderController::class, 'bayar'])
            ->name('order.bayar');

});
