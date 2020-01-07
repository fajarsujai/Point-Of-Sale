<?php

namespace App\Kategori;

use Illuminate\Database\Eloquent\Model;
use App\Produk\Produk;

class Kategori extends Model
{
    protected $fillable = ['kode_kategori','nama_kategori'];


    // one to many Product
    public function product()
    {
      return $this->belongsTo('App\Produk\Produk');
    }
}
