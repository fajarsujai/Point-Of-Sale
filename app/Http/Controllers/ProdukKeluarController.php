<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProdukKeluar\ProdukKeluar;
use Carbon\Carbon;
use PDF;
class ProdukKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProdukKeluar::whereDate('created_at', Carbon::today())->get();
        $sum_harga_dasar = ProdukKeluar::whereDate('created_at', Carbon::today())->sum('jumlah_harga_dasar');
        $sum_harga_jual = ProdukKeluar::whereDate('created_at', Carbon::today())->sum('jumlah_harga_jual');

        $untung_hari_ini = $sum_harga_jual - $sum_harga_dasar;

        return view('produkKeluar.index', compact('products','untung_hari_ini','sum_harga_dasar','sum_harga_jual'));
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
      //
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
        $pk = ProdukKeluar::where('id',$id)->get();
        return view('produkKeluar.edit', compact('pk'));
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
      $qty = $request->jumlah_keluar;
      $hj = $request->harga_jual;
      $hd = $request->harga_dasar;
      $pk = ProdukKeluar::findOrFail($id);
      $pk->jumlah_keluar = $qty;
      $pk->jumlah_harga_jual = $request->harga_jual*$qty;
      $pk->jumlah_harga_dasar = $hd*$qty;
      $pk->save();

      return redirect()->route('produkKeluar.index')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pk = ProdukKeluar::findOrFail($id);
      $pk->delete();
      return redirect()->route('produkKeluar.index')->with('status', 'Data Berhasil Dihapus');
    }

    //
    // public function getDinamisLaporanLaba()
    // {
    //   return view('produKeluar.labaDinamis');
    // }

    public function getTanggal(Request $request)
    {
      $tgl = $request->tanggal;
      $bln = $request->bulan;
      $thn = $request->tahun;
      $tanggal = $thn.'-'.$bln.'-'.$tgl;
      $products = ProdukKeluar::whereDate('created_at',$tanggal)->get();

      $sum_harga_dasar = ProdukKeluar::whereDate('created_at', $tanggal)->sum('jumlah_harga_dasar');
      $sum_harga_jual = ProdukKeluar::whereDate('created_at', $tanggal)->sum('jumlah_harga_jual');

      $untung_hari_itu = $sum_harga_jual - $sum_harga_dasar;


      return view('tanggal.tanggal',compact('products','tanggal','untung_hari_itu'));
    }


    public function postTanggal(Request $request)
    {
      $tgl = $request->tanggal;
      $bln = $request->bulan;
      $thn = $request->tahun;
      $tanggal = $thn.'-'.$bln.'-'.$tgl;

      // Via a request instance...
      $sess_tanggal =   $request->session()->put('tanggal', $tanggal);

      $products = ProdukKeluar::whereDate('created_at',$tanggal)->get();
      // dd($products);

      $sum_harga_dasar = ProdukKeluar::whereDate('created_at', $tanggal)->sum('jumlah_harga_dasar');
      $sum_harga_jual = ProdukKeluar::whereDate('created_at', $tanggal)->sum('jumlah_harga_jual');

      $untung_hari_itu = $sum_harga_jual - $sum_harga_dasar;


      return view('tanggal.tanggal',compact('products','tanggal','untung_hari_itu'));
    }
}
