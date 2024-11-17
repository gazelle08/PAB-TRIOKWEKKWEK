<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Menampilkan keranjang
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Menambahkan produk ke keranjang
    public function add(Request $request, $id)
    {
        $produk = Produk::find($id);

        // Cek apakah produk ada
        if (!$produk) {
            return redirect()->route('cart.index')->with('error', 'Produk tidak ditemukan!');
        }

        // Mengambil keranjang dari session
        $cart = session()->get('cart', []);

        // Cek apakah produk sudah ada di keranjang
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Menambahkan produk baru ke keranjang
            $cart[$id] = [
                'name' => $produk->nama,
                'quantity' => 1,
                'price' => $produk->harga,
                'image' => $produk->image,
            ];
        }

        // Menyimpan keranjang kembali ke session
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Menghapus produk dari keranjang
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    // Memperbarui jumlah produk di keranjang
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Validasi jumlah
            $request->validate(['quantity' => 'required|integer|min:1']);
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui!');
    }
}
