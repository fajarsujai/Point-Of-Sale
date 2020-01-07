@extends('layouts.base')


@section('title', 'Edit Penjualan')

@section('content')
<form id="form-create-produk" method="POST" action="{{route('produkKeluar.update', $pk[0]->id)}}">
    @csrf
    {{method_field('PATCH')}}
    <div class="form-group">
        <label for="kode_produk">Kode Produk</label>
        <input type="text" name="kode_produk" class="form-control" disabled value="{{$pk[0]->kode_produk}}">
    </div>

    <div class="form-group">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" disabled value="{{$pk[0]->product[0]->nama_produk}}">
    </div>

    <div class="form-group">
        <label for="satuan">Satuan</label>
        <input type="text" name="satuan" class="form-control" disabled value="{{$pk[0]->product[0]->satuan[0]->nama_satuan}}">
    </div>

    <div class="form-group">
        <label for="jumlah_keluar">Kuantitas</label>
        <input type="number" name="jumlah_keluar" class="form-control" value="{{$pk[0]->jumlah_keluar}}">
    </div>

    <div class="form-group">
        <label for="harga_dasar">Harga Dasar</label>
        <input type="number" class="form-control" disabled value="{{$pk[0]->harga_dasar}}">
        <input type="hidden" name="harga_dasar"  value="{{$pk[0]->harga_dasar}}">
    </div>

    <div class="form-group">
        <label for="harga_jual">Harga Jual</label>
        <input type="number" class="form-control" disabled value="{{$pk[0]->harga_jual}}">
        <input type="hidden" name="harga_jual"  value="{{$pk[0]->harga_jual}}">
    </div>

    <center>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary">Simpan</button>
            <a href="{{route('produkKeluar.index')}}" class="btn btn-outline-dark">Kembali</a>
        </div>
    </center>


</form>
@endsection
