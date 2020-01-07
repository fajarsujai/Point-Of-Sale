<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk\Produk;
use App\ProdukKeluar\ProdukKeluar;
use DB;
class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Produk::all();
        return view('penjualan.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // mengambil data dari jquery
      $jumlah_keluar = $request->jumlah_keluar;
      $kode_produk = $request->kode_produk;
      $harga_dasar = $request->harga_dasar;
      $jumlah_harga_dasar = $harga_dasar*$jumlah_keluar;
      //stok lama dikurangi jumlah keluar
      $product = Produk::where('kode_produk',$kode_produk)->get();
      $stok = $product[0]->stok;
      $stok_update =  $stok - $jumlah_keluar;

      // insert penjualan produk
      // $products = ProdukKeluar::create($request->all());

      $pk = new ProdukKeluar();
      $pk->kode_produk = $request->kode_produk;
      $pk->jumlah_keluar = $request->jumlah_keluar;
      $pk->harga_jual = $request->harga_jual;
      $pk->harga_dasar = $request->harga_dasar;
      $pk->jumlah_harga_jual = $request->jumlah_harga_jual;
      $pk->jumlah_harga_dasar = $jumlah_harga_dasar;

      $pk->save();

       //update stok
      Produk::where('kode_produk',$request->kode_produk)->update([
        'stok' => $stok_update,
      ]);

      return response()->json($pk);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
