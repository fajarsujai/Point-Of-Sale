<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori\Kategori;
use App\Produk\Produk;
use App\Satuan\Satuan;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Produk::all();
        return view('produk.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategories = Kategori::all();
        $satuans = Satuan::all();
        return view('produk.create', compact('kategories','satuans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $products = Produk::create($request->all());

      return response()->json($products);
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
        $kategories = Kategori::all();
        $satuans = Satuan::all();
        $product = Produk::where('id',$id)->get();
        return view('produk.edit', compact('product','kategories','satuans'));
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
        $product = Produk::findOrFail($id);
        $product->kode_produk = $request->kode_produk;
        $product->nama_produk = $request->nama_produk;
        $product->kode_kategori = $request->kode_kategori;
        $product->harga_dasar = $request->harga_dasar;
        $product->harga_jual = $request->harga_jual;
        $product->satuan_id = $request->satuan_id;
        $product->stok = $request->stok;

        $product->save();

        return redirect()->route('produk.index')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Produk::findOrFail($id);
        $product->delete();
        return redirect()->route('produk.index')->with('status', 'Data Berhasil Dihapus');
    }
}
