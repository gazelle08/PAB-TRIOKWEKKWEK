<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel cart
        $cartItems = Cart::all();
        
        // Kirim data ke view 'cart.index'
        return view('cart.index', compact('cartItems'));
    }
}
