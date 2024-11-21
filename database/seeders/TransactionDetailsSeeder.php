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
                'produkid' => 1, // Assuming this ID exists in produk
                'transactionid' => 1, // Assuming this ID exists in transaction
                'stock' => 2,
                'harga' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produkid' => 2,
                'transactionid' => 1,
                'stock' => 1,
                'harga' => 30000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produkid' => 3,
                'transactionid' => 2,
                'stock' => 1,
                'harga' => 350000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more transaction details as needed
        ]);
    }
}
