@extends('layouts.base')

@section('title', 'Halaman Utama')

@section('content')


  @include('komponen.jumbotron')
  <div class="row">
    <div class="col-sm-6">
      <div class="list-group">
        <a href="{{route('produk.index')}}" class="list-group-item list-group-item-action list-group-item-danger">Produk</a>
        <a href="{{route('kategori.index')}}" class="list-group-item list-group-item-action list-group-item-warning">Kategori</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-info">Pelanggan</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-dark">Produk Masuk</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-success">Supplier</a>
      </div>
    </div>
    <div class="col-sm-6">
      {{-- <a class="btn btn-primary" href="/form-produk-terjual" role="button">+</a>
      <label for=""> Input Produk Terjual</label> --}}

      <div class="list-group" >
        <a href="{{route('penjualan.index')}}" class="list-group-item list-group-item-action">Sistem Penjualan</a>
        <a href="{{route('produkKeluar.index')}}" class="list-group-item list-group-item-action list-group-item-primary">Lihat Keuntungan Hari ini</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Lihat Produk Terjual</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-success">Lihat Produk Terlaris</a>
      </div>
    </div>
  </div>

@endsection
