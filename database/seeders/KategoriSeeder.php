<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            [
                'nama' => 'Bricks/lego',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Diecast Motor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Action Figure',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Fun-doh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'RC Remote Control',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Boneka',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
