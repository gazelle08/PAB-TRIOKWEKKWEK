<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->insert([
            [
                'kategori_id' => 3,
                'berat' => 500,
                'deskripsi' => 'Produk ini berkualitas tinggi',
                'nama' => 'Bandai Chainsawman Vibration Stars Power MISB ORI Figure Chainsaw Man',
                'stock' => 47,
                'harga' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'berat' => 300,
                'deskripsi' => 'Produk B dengan harga terjangkau',
                'nama' => 'Banpresto Tokyo Revengers Manjirou Sano Mikey Figure MISB ORI Touman',
                'stock' => 50,
                'harga' => 30000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'berat' => 1000,
                'deskripsi' => 'Mainan Lego/Bricks Friends - Cupcake Buatan pabrik SY',
                'nama' => 'Brick SY 579 Friends - Cupcake Shop',
                'stock' => 20,
                'harga' => 350000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'berat' => 1000,
                'deskripsi' => 'Mainan lego dinosaurus T-Rex Tyrannosaurus Rex: - Buatan pabrik SY (SHENG YUAN)',
                'nama' => 'SY1507 Lego T-Rex Jurrasic World Tyrannosaurus Rex Bricks Dinosaurus',
                'stock' => 18,
                'harga' => 180000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2,
                'berat' => 500,
                'deskripsi' => 'Replika motor Yamaha YZF-R1 - Merk NewRay',
                'nama' => 'Diecast NewRay 1:12 Yamaha YZF-R1',
                'stock' => 61,
                'harga' => 170000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'berat' => 250,
                'deskripsi' => 'Figure statue pemimpin clan Uchiha yang merupakan musuh Naruto yaitu Uchiha Madara dengan spesifikasi: - KWS',
                'nama' => 'Figure Statue Naruto Shippuden Uchiha Madara',
                'stock' => 17,
                'harga' => 125000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 4,
                'berat' => 150,
                'deskripsi' => 'Lilin Mainan Fun-Doh OCreamy - Terbuat dari tepung, garam dan air',
                'nama' => 'Fundoh Ocreamy',
                'stock' => 69,
                'harga' => 35000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 6,
                'berat' => 430,
                'deskripsi' => 'Boneka Shimmer & Shine + aksesorisnya dari film animasi Nickelodeon - ORI Fisher-Price',
                'nama' => 'Boneka Shimmer and Shine doll',
                'stock' => 43,
                'harga' => 60000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 5,
                'berat' => 500,
                'deskripsi' => 'RC remote truk molen mini: - Menggunakan 2 buah batere AA pada remote (tidak termasuk dalam kemasan)',
                'nama' => 'RC Remote Cas Mobil Truk Molen Mixer Mini',
                'stock' => 47,
                'harga' => 120000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
