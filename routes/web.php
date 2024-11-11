<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Detail Produk
Route::get('/produk/{id}', [produkController::class, 'show'])->name('produk.show');

// Keranjang Belanja
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
