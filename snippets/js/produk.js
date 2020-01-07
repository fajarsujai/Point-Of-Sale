$('#btn-produk-save').click(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    e.preventDefault();
    var url_action = $('#form-create-produk').attr('action');
    var kode_produk = $('#form-create-produk').find('input[name="kode_produk"]').val();
    var nama_produk = $('#form-create-produk').find('input[name="nama_produk"]').val();
    var kode_kategori = $('#form-create-produk').find('select[name="kode_kategori"]').val();
    var harga_dasar = $('#form-create-produk').find('input[name="harga_dasar"]').val();
    var harga_jual = $('#form-create-produk').find('input[name="harga_jual"]').val();
    var satuan_id = $('#form-create-produk').find('select[name="satuan_id"]').val();
    var stok = $('#form-create-produk').find('input[name="stok"]').val();

    $.ajax({
        dataType: 'json',
        type: 'POST',
        url: url_action,
        data: {
            kode_produk: kode_produk,
            nama_produk: nama_produk,
            kode_kategori: kode_kategori,
            harga_dasar: harga_dasar,
            harga_jual: harga_jual,
            satuan_id: satuan_id,
            stok: stok,
        },
        success: function() {
            alert('Data berhasil ditambahkan');
            $('#form-create-produk').find('input[name="kode_produk"]').val('').focus();
            $('#form-create-produk').find('input[name="nama_produk"]').val('');
            $('#form-create-produk').find('select[name="kode_kategori"]').val('');
            $('#form-create-produk').find('input[name="harga_dasar"]').val('');
            $('#form-create-produk').find('input[name="harga_jual"]').val('');
            $('#form-create-produk').find('select[name="satuan_id"]').val('');
            $('#form-create-produk').find('input[name="stok"]').val('');
        },
        error: function(error) {
            console.log(error);
        }
    });
});