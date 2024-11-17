<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function index()
    {
        // Ambil data keranjang dari session
        $cart = session()->get('cart', []);
        return view('checkout.index', compact('cart'));
    }

    // Proses checkout
    public function process(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
        ]);

        // Proses pembayaran atau simpan data ke database
        // ...

        return redirect()->route('checkout.index')->with('success', 'Pembayaran berhasil diproses!');
    }
}

