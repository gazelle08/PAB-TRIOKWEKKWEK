<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number', 5000);
            $table->string('telepon', 255);
            $table->string('no_resi', 255)->nullable();
            $table->string('kurir', 255);
            $table->string('kota', 255);
            $table->integer('ongkir');
            $table->integer('total');
            $table->string('bukti_transaksi', 1000)->nullable();
            $table->dateTime('date');
            $table->string('alamat', 5000);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
