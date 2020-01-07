<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_keluars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('faktur_produk_keluar',35);
            $table->string('kode_pelanggan',20)->nullable();
            $table->string('kode_produk',20);
            $table->integer('harga_dasar');
            $table->integer('harga_jual');
            $table->integer('jumlah_keluar');
            $table->integer('jumlah_harga_jual');
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
        Schema::dropIfExists('produk_keluars');
    }
}
