<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_masuks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('faktur_produk_masuk',35);
            $table->string('kode_supplier',20);
            $table->string('kode_produk',20);
            $table->integer('harga_dasar');
            $table->integer('harga_jual');
            $table->integer('jumlah_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_masuks');
    }
}
