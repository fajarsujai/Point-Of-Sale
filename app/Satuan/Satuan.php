<?php

namespace App\Satuan;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $fillable = ['satuan','kode_satuan'];


    // terhubung id satuan pada produk
    public function product()
    {
      return $this->belongsTo('App\Produk\Produk','id','satuan_id');
    }
}
