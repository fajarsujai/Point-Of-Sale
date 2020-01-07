@extends('layouts.base')

@section('title','sistem penjualan')

@section('content')
<div class="container" style="margin-top:30px;margin-bottom:30px;">
    <div class="row">

        <div class="col-12">
            <table id="table_id" class="table table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Harga Dasar</th>
                        <th>Harga Jual</th>
                        <th>Potongan Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($products as $produk)
                    <tr>
                        <td scope="row">{{$i++}}</td>
                        <td>{{$produk->kode_produk}}</td>
                        <td>{{$produk->nama_produk}}</td>
                        <td>{{$produk->satuan[0]->nama_satuan}}</td>
                        <td>{{$produk->stok}}</td>
                        <td>{{$produk->harga_dasar}}</td>
                        <td class="harga_jual_potong{{$produk->id}}">{{$produk->harga_jual}}</td>
                        <td><input id="potongan_harga{{$produk->id}}" type="number" name="potongan_harga" class="form-control potong_harga{{$produk->id}}" value="0" placeholder="Contoh : 5000"></td>
                        <td>
                            <button data-satuan="{{$produk->satuan[0]->nama_satuan}}" id="btn-penjualan{{$produk->id}}" data-kode="{{$produk->kode_produk}}" data-id="{{ $produk->id }}" data-nama='{{ $produk->nama_produk }}' data-harga={{$produk->harga_jual}}
                              data-harga-dasar={{$produk->harga_dasar}} class="btn btn-success btn-penjualan btn-jual-{{$produk->id}}">Beli</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Harga Dasar</th>
                        <th>Harga Jual</th>
                        <th>Potongan Harga</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="editor"></div>


        {{-- Table Kedua --}}
        <div class="col-8" style="margin-top:15px;">
            <table id="table-order" class="table table-striped" style="margin-top:38px;">
                <thead>
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="table_penjualan">
                    <tr id="tr-total">
                        <th colspan="3">Total Bayar</th>
                        <td id="total_bayar"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Discount %</label>
                                        <input id="discount" type="number" name="discount" class="form-control" placeholder="Contoh : 10">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Jumlah Bayar Rp.</label>
                                        <input id="bayar" type="number" name="bayar" class="form-control" placeholder="Contoh : 10000">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" id="btn-print-order" class="btn btn-outline-primary">Print</button>
                            <button type="submit" id="btn-save-order" class="btn btn-warning">Save</button>
                        </td>
                        <td colspan="3">
                            <a href="#" id="btn-clear" class="btn btn-outline-danger">Clear</a>
                            <a href="#" class="btn btn-outline-dark">Kembali</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <form id='form-penjualan' class="" method="POST">

                <div id="diatas"></div>
            </form>

        </div>

    </div>
  </div>
    <div class="row">
        <div class="col-12" id="print">
            <h3>Toko Kelontong Hj.Dj</h3>
            <table class="table table-bordered d-print-table d-none">
                <thead>
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody id="tbody-penjualan-print">
                    <tr id="tr-total-print">
                        <th colspan="4">Total Bayar</th>
                        <td id="total_bayar_print"></td>
                    </tr>
                    <tr>
                        <th colspan="4">Tunai</th>
                        <td id="tunai"></td>
                    </tr>
                    <tr>
                        <th colspan="4">Kembalian</th>
                        <td id="kembalian"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    @endsection
