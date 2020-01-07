<?php

namespace App\Produk;

use Illuminate\Database\Eloquent\Model;
use App\Kategori\Kategori;
class Produk extends Model
{
    protected $fillable = ['kode_produk','nama_produk','kode_kategori','harga_dasar','harga_jual','satuan_id','stok'];

    // one to many (kategori)
    public function category()
    {
      return $this->hasMany('App\Kategori\Kategori','kode_kategori','kode_kategori');
    }

    // one to many (Satuan)
    public function satuan()
    {
      return $this->hasMany('App\Satuan\Satuan','id','satuan_id');
    }

    // belongs to produkKeluar
    public function produkKeluar()
    {
      return $this->belongTo('App\ProdukKeluar\ProdukKeluar','kode_produk','kode_produk');
    }
}
