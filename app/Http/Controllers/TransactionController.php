<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel transaction
        $transactions = Transaction::all();

        // Kirim data ke view 'transaction.index'
        return view('transaction.index', compact('transactions'));
    }
}


