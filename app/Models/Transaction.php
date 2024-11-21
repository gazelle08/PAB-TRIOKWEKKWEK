<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction'; // Ensure this matches your migration
    protected $fillable = [
        'transaction_number',
        'telepon',
        'no_resi',
        'kurir',
        'kota',
        'ongkir',
        'total',
        'bukti_transaksi',
        'date',
        'alamat',
    ];
}
