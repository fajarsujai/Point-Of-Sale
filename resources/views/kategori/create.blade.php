@extends('layouts.base')


@section('title', 'Create Category')

@section('content')
<form id="form-kategori" method="POST" action="{{route('kategori.store')}}">
    <div class="form-group">
        <label for="kode_kategori">Kode Kategori</label>
        <input name="kode_kategori" class="form-control" type="text" placeholder="Input Kode Kategori" id="kode_kategori">
    </div>

    <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <input name="nama_kategori" class="form-control" type="text" placeholder="Input Nama Kategori" id="nama_kategori">
    </div>

    <center>
        <div class="form-group" style="">
            <button id="btn-kategori-save" type="submit" class="btn btn-outline-primary">Simpan</button>
            <a href="{{route('kategori.index')}}" class="btn btn-outline-dark">Kembali</a>
        </div>
    </center>
</form>
@endsection
