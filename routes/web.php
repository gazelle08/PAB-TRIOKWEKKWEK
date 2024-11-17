<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/', [HomeController::class, 'index'])->name('home');

//home
Route::get('/produk', [ProdukController::class, 'index'])->name('products.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::resource('produk', ProdukController::class);


//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

//checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

//report
use App\Http\Controllers\ReportController;

Route::get('/sales-by-produk', [ReportController::class, 'reportSalesByProduk']);
Route::get('/top-categories', [ReportController::class, 'reportTopCategories']);
Route::get('/sales-by-produk/pdf', [ReportController::class, 'generateSalesByProdukPdf'])->name('sales-by-produk.pdf');
Route::get('/top-categories/pdf', [ReportController::class, 'generateTopCategoriesPdf'])->name('top-categories.pdf');
Route::get('/stok-produk-kategori', [ReportController::class, 'stokProdukByKategori']);
Route::get('/stok-produk-kategori/pdf', [ReportController::class, 'generatePdfStokProdukByKategori'])->name('stok.produk.kategori.pdf');
