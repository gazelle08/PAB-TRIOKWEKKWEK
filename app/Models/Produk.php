<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
      protected $table = 'produk';
    use HasFactory;
    protected $fillable = [
            'id',
            'kategori_id',
            'berat',
            'deskripsi',
            'nama',
            'stock',
            'harga',
        ];

        // Relasi ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
