<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;


class HomeController extends Controller
{
    public function index() {
        $produks = Produk::all(); // Fetch all products
        return view('home', compact('produks')); // Ensure 'home' matches your view file name
    }
    
}

