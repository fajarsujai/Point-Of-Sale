$('#btn-kategori-save').click(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    e.preventDefault();
    var url_action = $('#form-kategori').attr('action');
    var kode_kategori = $('#form-kategori').find('input[name="kode_kategori"]').val();
    var nama_kategori = $('#form-kategori').find('input[name="nama_kategori"]').val();


    $.ajax({
        dataType: 'json',
        type: 'POST',
        url: url_action,
        data: {
            kode_kategori: kode_kategori,
            nama_kategori: nama_kategori,
        },
        success: function() {
            alert('Data berhasil ditambahkan');
        }
    });
});