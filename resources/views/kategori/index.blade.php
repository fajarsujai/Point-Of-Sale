@extends('layouts.base')


@section('title', 'Table Kategori')

@section('content')
<center>
    <div class="form-group">
        <a href="{{route('kategori.create')}}" class="btn btn-outline-primary">Tambah Kategori</a>
    </div>
</center>
<table id="table_id" class="table table-striped table-bordered table-sm">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Kategori</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>

        @foreach($categories as $kategori)
        <tr>
            <td scope="row">{{$i++}}</td>
            <td>{{$kategori->kode_kategori}}</td>
            <td>{{$kategori->nama_kategori}}</td>
            <td>
                <a href="{{route('kategori.edit', $kategori->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <form onsubmit="return confirm('Apakah Anda yakin Data ini Akan Dihapus?')" class="d-inline" action="{{route('kategori.destroy', $kategori->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Kode Kategori</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
</table>

@endsection
