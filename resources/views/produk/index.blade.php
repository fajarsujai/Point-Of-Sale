@extends('layouts.base')


@section('title', 'Table product')

@section('content')
<center>
  <div class="form-group">
    <a href="{{route('produk.create')}}" class="btn btn-outline-primary">Tambah Product</a>
  </div>
</center>
<table id="table_id" class="table table-striped table-bordered table-sm">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Nama Kategori</th>
            <th>Satuan</th>
            <th>Stok</th>
            <th>Harga Dasar</th>
            <th>Harga Jual</th>
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
            <td>{{$produk->category[0]->nama_kategori}}</td>
            <td>{{$produk->satuan[0]->nama_satuan}}</td>
            <td>{{$produk->stok}}</td>
            <td>{{format_uang($produk->harga_dasar)}}</td>
            <td>{{format_uang($produk->harga_jual)}}</td>
            <td>
                <a href="{{route('produk.edit', $produk->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                <form onsubmit="return confirm('Apakah Anda yakin Data ini Akan Dihapus?')" class="d-inline" action="{{route('produk.destroy', $produk->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Nama Kategori</th>
            <th>Satuan</th>
            <th>Stok</th>
            <th>Harga Dasar</th>
            <th>Harga Jual</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
</table>
@endsection
