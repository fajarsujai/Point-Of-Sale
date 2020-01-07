<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProdukKeluar\ProdukKeluar;
use PDF;
use Carbon\Carbon;
class CetakPdfController extends Controller
{
  // cetak pdf laporan laba
  public function cetakPdf()
  {
    $products = ProdukKeluar::whereDate('created_at', Carbon::today())->get();
    $sum_harga_dasar = ProdukKeluar::whereDate('created_at', Carbon::today())->sum('harga_dasar');
    $sum_harga_jual = ProdukKeluar::whereDate('created_at', Carbon::today())->sum('jumlah_harga_jual');

    $untung_hari_ini = $sum_harga_jual - $sum_harga_dasar;

    $pdf = PDF::loadview('produkKeluar.cetakPdf', compact('products','untung_hari_ini','sum_harga_dasar','sum_harga_jual'));
    return $pdf->stream();
  }


  // cetak pdf laporan laba
  public function cetakPdfTanggal(Request $request)
  {
    $tanggal = $request->session()->get('tanggal');

    $products = ProdukKeluar::whereDate('created_at', $tanggal)->get();
    $sum_harga_dasar = ProdukKeluar::whereDate('created_at', $tanggal)->sum('harga_dasar');
    $sum_harga_jual = ProdukKeluar::whereDate('created_at', $tanggal)->sum('jumlah_harga_jual');

    $untung_hari_ini = $sum_harga_jual - $sum_harga_dasar;

    $pdf = PDF::loadview('produkKeluar.cetakPdf', compact('tanggal','products','untung_hari_ini','sum_harga_dasar','sum_harga_jual'));
    return $pdf->stream();
  }
}
