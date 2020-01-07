@extends('layouts.base')


@section('title', 'Tambah Satuan')

@section('content')
<form id="form-kategori" method="POST" action="{{route('satuan.store')}}">
    @csrf

    <div class="form-group">
        <label for="nama_satuan">Nama Satuan</label>
        <input name="nama_satuan" class="form-control" type="text" placeholder="Input Nama Satuan" id="nama_satuan">
    </div>

    <center>
        <div class="form-group" style="">
            <button type="submit" class="btn btn-outline-primary">Simpan</button>
            <a href="{{route('satuan.index')}}" class="btn btn-outline-dark">Kembali</a>
        </div>
    </center>
</form>
@endsection
