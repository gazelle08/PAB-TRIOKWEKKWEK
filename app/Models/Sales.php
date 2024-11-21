<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_id',
        'quantity',
        'sale_date',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
