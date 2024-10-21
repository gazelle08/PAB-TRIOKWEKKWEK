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
                'produk_id' => 2,
                'quantity' => 20,
                'sale_date' => Carbon::now()->subDays(10)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 18,
                'quantity' => 8,
                'sale_date' => Carbon::now()->subDays(5)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 19,
                'quantity' => 25,
                'sale_date' => Carbon::now()->subDays(2)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 20,
                'quantity' => 15,
                'sale_date' => Carbon::now()->subDays(2)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 21,
                'quantity' => 8,
                'sale_date' => Carbon::now()->subDays(2)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 22,
                'quantity' => 9,
                'sale_date' => Carbon::now()->subDays(2)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 23,
                'quantity' => 7,
                'sale_date' => Carbon::now()->subDays(2)->toDateTimeString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
