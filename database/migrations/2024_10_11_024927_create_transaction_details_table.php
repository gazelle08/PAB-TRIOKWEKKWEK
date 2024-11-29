<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('transaction_id');
            $table->integer('stock');
            $table->decimal('harga', 10, 2);
            $table->timestamps();

            // Foreign keys
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transaction')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}