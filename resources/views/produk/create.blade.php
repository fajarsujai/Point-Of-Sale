@extends('layouts.base')


@section('title', 'create product')

@section('content')
<form id="form-create-produk" method="POST" action="{{route('produk.store')}}">

    <div class="form-group">
        <label for="kode_produk">Kode Produk</label>
        <input type="text" name="kode_produk" class="form-control" id="kode_produk" placeholder="Input Kode Produk">
    </div>

    <div class="form-group">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" id="nama_produk" placeholder="Input Nama Produk">
    </div>

    <div class="form-group">
        <label for="kode_kategori">Kategori</label>
        <select class="form-control" id="kode_kategori" name="kode_kategori">
            <option disabled selected>Pilihan...</option>
            @foreach($kategories as $kategori)
            <option value="{{$kategori->kode_kategori}}">{{$kategori->nama_kategori}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="harga_dasar">Harga Dasar</label>
        <input type="number" name="harga_dasar" class="form-control" id="harga_dasar" placeholder="Input harga dasar">
    </div>

    <div class="form-group">
        <label for="harga_jual">Harga Jual</label>
        <input type="number" name="harga_jual" class="form-control" id="harga_jual" placeholder="Input harga jual">
    </div>

    <div class="form-group">
        <label for="satuan_id">Satuan Produk</label>
        <select class="form-control" id="satuan_id" name="satuan_id">
            <option disabled selected>Pilihan...</option>
            @foreach ($satuans as $satuan)
              <option value="{{$satuan->id}}">{{$satuan->nama_satuan}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="stok">Stok Produk</label>
        <input type="number" name="stok" class="form-control" id="stok" placeholder="Input Stok Produk">
    </div>

    <center>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary" id="btn-produk-save">Simpan</button>
            <a href="{{route('produk.index')}}" class="btn btn-outline-dark">Kembali</a>
        </div>
    </center>


</form>
@endsection
