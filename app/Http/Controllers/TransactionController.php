<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'produk.*.id' => 'required|exists:produks,id',
            'produk.*.jumlah' => 'required|integer',
            'produk.*.harga' => 'required|numeric',
        ]);

        // Simpan transaksi
        $transaction = Transaction::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        // Simpan detail transaksi
        foreach ($request->produk as $produk) {
            TransactionDetail::create([
                'produk_id' => $produk['id'],
                'transaction_id' => $transaction->id,
                'jumlah' => $produk['jumlah'],
                'harga' => $produk['harga'],
            ]);
        }

        return response()->json(['message' => 'Transaction successful']);
    }
}