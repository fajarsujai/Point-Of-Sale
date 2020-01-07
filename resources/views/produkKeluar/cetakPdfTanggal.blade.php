<link rel="stylesheet" href="{{asset('snippets/css/styleCetakTable.css')}}">
<table>
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
            <td>{{$produk->product[0]->satuan}}</td>
            <td>{{$produk->jumlah_keluar}}</td>
            <td>{{$produk->harga_dasar}}</td>
            <td>{{$produk->harga_jual}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="6">Jumlah</td>
            <td>
                @php echo $sum_harga_dasar
                @endphp</td>
            <td>
                @php echo $sum_harga_jual
                @endphp</td>
        </tr>
    </tbody>
</table>
<center>
    <h3>Laporan Keuntungan Pada Tanggal :
        @php echo date('d-m-Y')
        @endphp</h3>
        <h4>Keuntungan hari ini :
            @php echo $untung_hari_ini
            @endphp</h4>
</center>
