@extends('layouts.base')


@section('title', 'Table product')

@section('content')
<center>
  <div class="form-group">
    <a href="{{route('satuan.create')}}" class="btn btn-outline-primary">Tambah Satuan</a>
  </div>
</center>
<table id="table_id" class="table table-striped table-bordered table-sm">
    <thead>
        <tr>
            <th>No</th>
            <th>Satuan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>

        @foreach($satuans as $satuan)
        <tr>
            <td scope="row">{{$i++}}</td>
            <td>{{$satuan->nama_satuan}}</td>
            <td>
                <a href="{{route('satuan.edit', $satuan->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <form onsubmit="return confirm('Apakah Anda yakin Data ini Akan Dihapus?')" class="d-inline" action="{{route('satuan.destroy', $satuan->id)}}" method="POST">
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
            <th>Satuan</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
</table>
@endsection
