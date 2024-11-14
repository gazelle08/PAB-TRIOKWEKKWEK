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

use App\Http\Controllers\ReportController;

Route::get('/sales-by-produk', [ReportController::class, 'reportSalesByProduk']);
Route::get('/top-categories', [ReportController::class, 'reportTopCategories']);
Route::get('/sales-by-produk/pdf', [ReportController::class, 'generateSalesByProdukPdf'])->name('sales-by-produk.pdf');
Route::get('/top-categories/pdf', [ReportController::class, 'generateTopCategoriesPdf'])->name('top-categories.pdf');
Route::get('/stok-produk-kategori', [ReportController::class, 'stokProdukByKategori']);
Route::get('/stok-produk-kategori/pdf', [ReportController::class, 'generatePdfStokProdukByKategori'])->name('stok.produk.kategori.pdf');
