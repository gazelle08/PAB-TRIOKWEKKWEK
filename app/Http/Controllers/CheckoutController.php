<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // Pastikan view 'checkout' sesuai dengan file yang Anda buat di resources/views/checkout.blade.php
        return view('checkout');
    }
}
