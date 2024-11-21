<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; // Import the Transaction model

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function index()
    {
        // Ambil data keranjang dari session
        $cart = session()->get('cart', []);
        
        // Ambil semua data transaksi
        $transactions = Transaction::all(); // Get all transactions

        return view('checkout.index', compact('cart', 'transactions'));
    }

    // Proses checkout
    public function process(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
            'kota' => 'required|string|max:100',
            'kurir' => 'nullable|string|max:100', // Make kurir optional
        ]);
    
        // Ambil data keranjang dari session
        $cart = session()->get('cart', []);
    
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang Anda kosong!');
        }
        $totalPrice = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $ongkir = $this->calculateShippingCost($request->kota);
        $kurir = $request->kurir ?: 'JNT'; // Default to JNT if not provided
    
        // Proses pembayaran atau simpan data ke database
        $transaction = new Transaction();
        $transaction->transaction_number = 'TRX-' . time();
        $transaction->telepon = $request->phone;
        $transaction->kota = $request->kota;
        $transaction->kurir = $kurir; // Correctly assign the courier
        $transaction->total =  $totalPrice;
        $transaction->ongkir = $ongkir; // Set the calculated shipping cost
        $transaction->alamat = $request->address;
        $transaction->date = now();
        $transaction->save();
    
        // Clear the cart
        session()->forget('cart');
    
        // Pass the latest transaction to the session
        return redirect()->route('checkout.index')->with([
            'success' => 'Pembayaran berhasil diproses!',
            'latest_transaction' => $transaction // Pass the latest transaction
        ]);
    }
    
    // Method to calculate shipping cost
    private function calculateShippingCost($city)
    {
        // Define shipping rates based on city
        $shippingRates = [
            'Jakarta' => 15000,
            'Bandung' => 20000,
            'Surabaya' => 30000,
            'Medan'    => 8000,
        ];
    
        return $shippingRates[$city] ?? 25000; // Default rate if city not found
    }    
}
