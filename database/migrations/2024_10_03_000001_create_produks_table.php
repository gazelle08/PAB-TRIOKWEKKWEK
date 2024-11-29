<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade'); // Relasi dengan kategori
            $table->string('nama', 500);
            $table->decimal('berat', 8, 2); // Berat dengan presisi (contoh: 1.25 kg)
            $table->integer('stock');
            $table->integer('harga');
            $table->string('image')->nullable(); // Kolom untuk menyimpan gambar
            $table->text('deskripsi')->nullable(); // Deskripsi bisa kosong
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
