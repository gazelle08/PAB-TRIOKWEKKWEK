<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        DB::table('transaction')->insert([
            [
                'transaction_number' => 'TRX001',
                'telepon' => '08123456789',
                'kurir' => 'JNE',
                'kota' => 'Jakarta',
                'ongkir' => 10000,
                'total' => 150000,
                'date' => now(),
                'alamat' => 'Jl. Contoh No. 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_number' => 'TRX002',
                'telepon' => '08198765432',
                'kurir' => 'Tiki',
                'kota' => 'Bandung',
                'ongkir' => 15000,
                'total' => 200000,
                'date' => now(),
                'alamat' => 'Jl. Contoh No. 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more transactions as needed
        ]);
    }
}
