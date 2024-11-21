<?php

namespace App\Imports;

use App\Models\Sales;
use App\Models\Produk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class SalesImport implements ToModel, WithHeadingRow
{
    /**
     * Transform data dari setiap baris menjadi model.
     */
    public function model(array $row)
    {
        return new Sales([
            'produk_id' => Produk::where('nama', $row['produk'])->value('id'), // Relasi produk berdasarkan nama
            'quantity' => $row['kuantitas'],
            'sale_date' => Carbon::parse($row['tanggal_penjualan']), // Konversi tanggal ke format valid
        ]);
    }
}
