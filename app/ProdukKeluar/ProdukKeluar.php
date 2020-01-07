<?php

namespace App\ProdukKeluar;

use Illuminate\Database\Eloquent\Model;

class ProdukKeluar extends Model
{
    protected $fillable = ['faktur','kode_pelanggan','kode_produk','jumlah_keluar','harga_dasar','harga_jual','jumlah_harga_jual','jumlah_harga_dasar'];


    // one to many product
    public function product()
    {
      return $this->hasMany('App\Produk\Produk','kode_produk','kode_produk');
    }
}
