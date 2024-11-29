<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailsSeeder extends Seeder
{
    public function run()
    {
        DB::table('transaction_details')->insert([
            [
                'produk_id' => 1, // Assuming this ID exists in produk
                'transaction_id' => 9, // Assuming this ID exists in transaction
                'stock' => 2,
                'harga' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 2,
                'transaction_id' => 10,
                'stock' => 1,
                'harga' => 30000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 3,
                'transaction_id' => 11,
                'stock' => 1,
                'harga' => 350000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more transaction details as needed
        ]);
    }
}
