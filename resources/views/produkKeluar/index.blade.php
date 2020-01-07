@extends('layouts.base')


@section('title', 'Table product')

@section('content')
  <center>
    <h3>Laporan Keuntungan Pada Tanggal : @php echo date('d-m-Y') @endphp</h3>
    <h4>keuntungan Total hari ini : @php echo $untung_hari_ini @endphp</h4>
  </center>
  <div class="form-group">
    <label for=""><h5>Print Laporan Keuntungan Hari ini : </h5></label>
    <a href="{{route('produkKeluar.cetakPdf')}}" class="btn btn-primary" target="_blank">Print</a>
  </div>
  <form class="" action="{{route('post.tanggal.tanggal')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="">Lihat Laporan Hari Lain : </label>
      <input type="text" name="tanggal" value="">
      <select name="bulan">
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">Nopember</option>
        <option value="12">Desember</option>
      </select>
      <input type="tahun" name="tahun" value="">
      <button type="submit" class="btn btn-primary" >Cari</button>
    </div>
    </form>
  <table id="table_id" class="table table-striped table-bordered table-sm">
      <thead>
          <tr>
              <th>No</th>
              <th>Kode Produk</th>
              <th>Nama Produk</th>
              <th>Nama Kategori</th>
              <th>Satuan</th>
              <th>Harga Dasar</th>
              <th>Harga Jual</th>
              <th>Kuantitas</th>
              <th>Jumlah</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
          <?php $i=1; ?>

          @foreach($products as $produk)
          <tr>
              <td scope="row">{{$i++}}</td>
              <td>{{$produk->kode_produk}}</td>
              <td>{{$produk->product[0]->nama_produk}}</td>
              <td>{{$produk->product[0]->category[0]->nama_kategori}}</td>
              <td>{{$produk->product[0]->satuan[0]->nama_satuan}}</td>
              <td>{{format_uang($produk->harga_dasar)}}</td>
              <td>{{format_uang($produk->harga_jual)}}</td>
              <td>{{$produk->jumlah_keluar}}</td>
              <td>{{format_uang($produk->jumlah_harga_jual)}}</td>
              <td>
                  <a href="{{route('produkKeluar.edit', $produk->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                  <form onsubmit="return confirm('Apakah Anda yakin Data ini Akan Dihapus?')" class="d-inline" action="{{route('produkKeluar.destroy', $produk->id)}}" method="POST">
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
              <th>Harga Dasar</th>
              <th>Harga Jual</th>
              <th>Kuantitas</th>
              <th>Jumlah</th>
              <th>Aksi</th>
          </tr>
      </tfoot>
  </table>

@endsection
