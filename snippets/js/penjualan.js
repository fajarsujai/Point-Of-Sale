//fungsi menghitung sum object
function sumValues(harga_obj) {
    let sum = 0;
    for (let ho of Object.values(harga_obj)) {
        sum += ho;
    }

    return sum;
}



var harga_total = 0;
var harga_obj = {};
var sum = 0;
var harga_quantity = 0;
var total_bayar = {};
var kode_obj = {};
var jumlah_keluar_obj = {};
var clc = {};
var kembalian = {};
$(document).ready(function() {


    $('.btn-penjualan').click(function() {
        var id = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        var harga = $(this).attr('data-harga');
        var harga_dasar = $(this).attr('data-harga-dasar');
        var kode_produk = $(this).attr('data-kode');
        var satuan = $(this).attr('data-satuan');
        var potongan_harga = $('#potongan_harga' + id).val();
        var qty = "<input type='number' class='form-control quantity" + id + "' name='qty' value='1' />"


        harga_potong = parseInt(harga) - parseInt(potongan_harga)
        harga_obj[id] = harga_potong;
        harga_quantity = harga_potong * 1;

        $('#btn-penjualan' + id).attr("disabled", true);
        var baris_baru = "<tr id='tr-produk' class='tr-produk-" + id + "'><td>" + nama + "</td><td>" + harga + "</td><td>" + qty + "</td><td id='harga_quantity" + id + "'>" + harga_quantity + "</td><td><button class='btn btn-danger btn-hapus-" + id + "'>X</button></td><tr>";
        total_bayar['total_bayar'] = sumValues(harga_obj);

        $(baris_baru).insertBefore("#tr-total");
        $('#total_bayar').html(total_bayar['total_bayar']);

        inputQty(id, harga_dasar, harga_potong);
        deleteProduk(id);
        btnClear(id);

        var baris_baru_print = "<tr id='tr-produk' class='tr-produk-" + id + "'><td>" + nama + "</td><td>" + satuan + "</td><td>" + harga + "</td><td class='qa" + id + "'>" + 1 + "</td><td id='harga_quantity_print" + id + "'>" + harga_quantity + "</td><tr>";
        $(baris_baru_print).insertBefore("#tr-total-print");
        $('#total_bayar_print').html(total_bayar['total_bayar']);
        var quantity = $(".quantity" + id + "").val();
        kode_obj[id] = kode_produk;
        clc[id] = [kode_produk, parseInt(quantity), parseInt(harga_dasar), parseInt(harga), harga_quantity];



        // console.log(clc);
    });

    // fungsi mengubah nilai quantity
    function inputQty(id, harga_dasar, harga) {
        //event change value input
        $(".quantity" + id + "").change(function() {
            //mengambil value input sesuai id
            var quantity = $(".quantity" + id + "").val();
            var harga_qty = harga * quantity;
            harga_obj[id] = harga_qty;

            jumlah_keluar_obj[id] = parseInt(quantity);
            clc[id][1] = quantity;
            clc[id][4] = harga_qty;
            total_bayar['total_bayar'] = sumValues(harga_obj);
            $('#harga_quantity' + id).html(harga_qty);
            $('#total_bayar').html(total_bayar['total_bayar']);

            $('.qa' + id).html(quantity);
            $('#harga_quantity_print' + id).html(harga_qty);
            $('#total_bayar_print').html(total_bayar['total_bayar']);

            // console.log(clc);
        });
    }



    //fungsi hapus row produk
    function deleteProduk(id) {
        $(".btn-hapus-" + id + "").click(function() {
            // operasi hitung
            total_bayar['total_bayar'] = total_bayar['total_bayar'] - harga_obj[id];
            harga_obj[id] = harga_obj[id] - harga_obj[id];

            $('tr').remove('.tr-produk-' + id + '');
            $('.btn-jual-' + id + '').attr("disabled", false);
            $('#total_bayar').html(total_bayar['total_bayar']);
            $('#total_bayar_print').html(total_bayar['total_bayar']);
        });
    }


    function btnClear(item_id) {
        $('#btn-clear').click(function() {
            total_bayar['total_bayar'] = 0;
            delete clc[item_id];
            harga_obj[item_id] = 0;
            $('tr').remove('#tr-produk');
            $('.btn-penjualan').attr("disabled", false);
            $('#total_bayar').html(total_bayar['total_bayar']);
            $('#total_bayar_print').html(total_bayar['total_bayar']);
        });
    }
});





$('#btn-print-order').click(function() {
    // console.log(clc);
    var bayar = $('#bayar').val();
    var kembalian = parseInt(bayar) - total_bayar['total_bayar'];
    $('#tunai').html(bayar);
    $('#kembalian').html(kembalian);
    $('#print').print({
        timeout: 750,
        iframe: false,
    });
});

$('#btn-save-order').click(function(e) {
    var x, i;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // console.log(clc);
    e.preventDefault();
    var url_action = $('#print').attr('action');
    // for (i = 0; i < clc[x].length; i++) {
    for (x in clc) {
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: url_action,
            data: {
                kode_produk: clc[x][0],
                jumlah_keluar: clc[x][1],
                harga_dasar: clc[x][2],
                harga_jual: clc[x][3],
                jumlah_harga_jual: clc[x][4],
            },
            success: function(data) {
                // console.log(data)
            },

            error: function(error) {
                console.log(error);
            }
        });
    }
    alert('Data berhasil ditambahkan');
    // }
});