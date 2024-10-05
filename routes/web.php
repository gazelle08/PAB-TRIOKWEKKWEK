<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;

// Route untuk menampilkan semua data dari Cart
Route::get('/cart', [CartController::class, 'index']);

// Route untuk menampilkan semua data dari Transaction
Route::get('/transactions', [TransactionController::class, 'index']);
