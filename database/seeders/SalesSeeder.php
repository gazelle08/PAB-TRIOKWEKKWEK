<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert([
            [
                'produk_id' => 1,
                'quantity' => 20,
                'sale_date' => Carbon::now()->subDays(10)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 2,
                'quantity' => 8,
                'sale_date' => Carbon::now()->subDays(5)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 3,
                'quantity' => 25,
                'sale_date' => Carbon::now()->subDays(2)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 4,
                'quantity' => 15,
                'sale_date' => Carbon::now()->subDays(2)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 5,
                'quantity' => 8,
                'sale_date' => Carbon::now()->subDays(2)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 6,
                'quantity' => 9,
                'sale_date' => Carbon::now()->subDays(2)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 7,
                'quantity' => 7,
                'sale_date' => Carbon::now()->subDays(2)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
