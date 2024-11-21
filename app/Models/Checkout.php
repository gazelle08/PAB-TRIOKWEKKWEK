<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    
        protected $table = 'checkout';
        protected $fillable = ['id', 'transaction_number', 'telepon', 'kota', 'kurir', 'total', 'ongkir', 'alamat', 'date'];
    }
