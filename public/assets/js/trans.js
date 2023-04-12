


$('#btnSimpan, #btnCetak, #btnAdd').css({
    cursor: 'not-allowed'
})

// AKHIR BAGIAN KIRI
let path = $("#urltes").val();
var namaterpakai = [];
var no = 0
var masteragen =
$.ajax({
        type: 'GET',
        url: path,
        global: false,
        async:false,
        success: function(data) {
            return data;
        }
    }).responseJSON;
console.log(masteragen);

// Jquery autocomplete
$('#nama_agent').autocomplete({
    source: masteragen,
    select: function (e, ui) {
            // $('#nama_barang_head').val(ui.item.label);
            $('#nama_agent').val(ui.item.label)
            $('#id_agent').val(ui.item.id)
            $('#harga_head').val(ui.item.harga)
            $('#harga_head_tampil').val('Rp. ' + formatRupiah(ui.item.harga))

            $('#stok_head').val(ui.item.qty)

            $('#qty_head').val('1')
            $('#qty_head').prop('disabled', false)
            $('#qty_head').focus()
            $('#qty_head').css({
                cursor: 'auto'
            })

            $('#subtotal_head').val(parseInt($('#qty_head').val()) * parseInt($('#harga_head').val()))

            $('#subtotal_head_tampil').val('Rp. ' + formatRupiah(parseInt($('#qty_head').val()) * parseInt($('#harga_head').val())))

            $('#qty_head').on('keyup change', function () {
                $('#subtotal_head').val(parseInt($('#qty_head').val()) * parseInt($('#harga_head').val()))
                $('#subtotal_head_tampil').val('Rp. ' + formatRupiah(parseInt($('#qty_head').val()) * parseInt($('#harga_head').val())))
                if ($('#qty_head').val() == "" || $('#qty_head').val() < 1) {
                    $('#subtotal_head_tampil').val('Rp. 0')
                }

            })
            $('#btnAdd').prop('disabled', false)
            $('#btnAdd').css({
                cursor: 'pointer'
            })


     }
})

// TAMBAH barang KE BELANJAAN
$(document).on('click', '#btnAdd', function (e) {
    e.preventDefault()

    // let nm_barang = $('#input_kode').val()
    let nama_agent = $('#nama_agent').val()
    let id_agent = $('#id_agent').val()
    let stok = parseInt($('#stok_head').val())
    let qty = parseInt($('#qty_head').val())
    let subtotal = $('#subtotal_head').val()
    let harga = $('#harga_head').val()
    let selisihqty = qty-stok

    if (selisihqty < 0 ) {
        selisihqty = 0
    }


    if ($('#qty_head').val() == "" || qty < 1) {
        // jika qty kosong / belum terisi atau qty kurang dari 1
        $('#qty_head').focus()
        $('#nama_agent').val(nama_agent)
        swAlert('Gagal', 'Qty tidak boleh kosong!', 'warning')

    } else if (namaterpakai.includes(id_agent,0)){
        kosongkanHeader()
        fntoast('error', 'Gagal Input Penjualan', 'Barang sebelumnya sudah ditambah'+ '\n harap hapus dahulu jika ingin merubah qty');
        // klo gagal
    } else {
        // Tambahkan ke table #tbodyTransaksi
        namaterpakai.push(id_agent)
        no ++
        let dataTrx = '<tr id="listagent">' +
            '<td id="idarray">'+ no +'</td>' +
            '<td name="nama_agent'+no+'" id="nama_agent'+no+'">' + nama_agent + '</td>' +
            '<td id="id_agent'+no+'" name="id_agent'+no+'" style="display:none">' + id_agent + '</td>' +
            '<td name="harga'+no+'" id="harga'+no+'">Rp. ' + formatRupiah(harga) + '</td>' +
            '<td name="hargaval'+no+'" id="hargaval'+no+'" style="display:none">' +harga+ '</td>' +
            '<td name="qtyselisih'+no+'" id="qtyselisih'+no+'" style="display:none">' +selisihqty+ '</td>' +
            '<td name="qty'+no+'" id="qty'+no+'">' +qty+ '</td>' +
            '<td name="subtotal'+no+'"  id="subtotal'+no+'"><p style="display:inline"> Rp. ' + formatRupiah(subtotal) + '</p>' + '</td>' +
            '<td name="subtotalval'+no+'"  id="subtotalval'+no+'" style="display:none" class="subtotalval">'+subtotal+ '</td>' +
            '<td name="tes">' +
            '<a href="#" id="hapusItem"><i class="far fa-window-close fa-2x text-danger"></i></a>' +
            '</td>' +
            '</tr>'

        $('tbody#tbodyTransaksi').append(dataTrx)

        GrandTotal()

        kosongkanHeader()

        $('#btnAdd, #qty_head').css({
            cursor: 'not-allowed'
        })
    }
})

// menghapus barang ketika icon(X) ditekan
$(document).on('click', '#hapusItem', function (e) {
    e.preventDefault()


    // Mengambil index icon(X) ditekan, agar barang tidak terhapus semua

    let idarray = parseInt($(this).parent().parent().find('#idarray').html())

    $(this).parent().parent().remove()

    GrandTotal()
    $('#btnSimpan').prop('disabled', true)
    $('#btnCetak').prop('disabled', true)
    delete namaterpakai[idarray-1];

    console.log(namaterpakai.includes('1',0));

})

// ketika tombol Batal diklik maka semuanya akan seperti awal lagi
$(document).on('click', '#btnBatal', function (e) {
    e.preventDefault()

    $('#nama_agent').focus()
    kosongkanSemua()

})



// Input format rupiah(jquery automask)
// $('#inputBayar').mask('0.000.000.000', {
//     reverse: true
// })

// Ketika tombol Simpan diklik
$('#formstore').on('submit', function ( e) {
     kosongkanHeader()

    var table  = $('#tblTransaksi').tableToJSON({
        ignoreColumns : [9]

    });

    let datajs =JSON.stringify(table);
    $('#data').val(datajs);

    // $('#btnSimpan').html('<i class="fa fa-save pr-2"></i>Simpan')
    //// sampe sini hapusnya
})

// Menghapus semua inputan yang ada pada kode / nama barang, harga, QTY, subtotal
function kosongkanHeader() {
    $('#nama_agent').val('')
    $('#nama_agent').focus()

    $('#id_agent').val('')
    $('#stok_head').val('')
    $('#qtyselisih').val('')

    $('#qty_head').val('')
    $('#qty_head').prop('disabled', true)

    $('#subtotal_head').val('')
    $('#subtotal_head_tampil').val('')

    $('#harga_head').val('')
    $('#harga_head').val('')
    $('#harga_head_tampil').val('')

    $('#btnAdd').prop('disabled', true)
    $('#btnAdd, #qty_head').css({
        cursor: 'not-allowed'
    })

    GrandTotal()
}

// menghitung grandtotal
function GrandTotal() {
    let total = 0

    $('.subtotalval').each(function () {
        total += parseInt($(this).html())
    })


    $('#grandTotal').html('GRAND TOTAL : Rp. ' + formatRupiah(total) + ',-')
    $('#grandtotalval').val(total)

    if (total==0){
        $('#btnSimpan').prop('disabled', true)
        $('#btnSimpan').css({
            cursor: 'not-allowed'
        })

    } else {
        $('#btnSimpan').prop('disabled', false)
        $('#btnSimpan').css({
            cursor: 'pointer'
        })
    }
}


// membuat angka menjadi format rupiah
function formatRupiah(rupiah) {
    let rev = parseInt(rupiah, 10).toString().split('').reverse().join('')
    let rev2 = ''

    for (let i = 0; i < rev.length; i++) {
        rev2 += rev[i]
        if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {
            rev2 += '.'
        }
    }

    return rev2.split('').reverse().join('')
}

// Mengembalikan semuanya ke awal
// menghapus semua inputan yang sudah diisi
// atau sama dengan refresh halaman
function kosongkanSemua() {
    $('#tblTransaksi tbody tr').remove()
    $('#btnSimpan').prop('disabled', true)
    $('#btnCetak').prop('disabled', true)
    namaterpakai = [];
    no = 0

    kosongkanHeader()

    GrandTotal()
}


function fntoast(tipe,head, msg)
{
    let toastAnimationExample = '';
    $('.judultoaser').html('Input Penjualan');
    if (tipe == 'success') {
        toastAnimationExample = document.getElementById('toast-ex-sucscess');
        $('.toast-body').html(msg);
        $('.judultoaser').html(head);
    } else if (tipe == 'warning') {
        toastAnimationExample = document.getElementById('toast-ex-warning');
        $('.toast-body').html(msg);
        $('.judultoaser').html();
    } else {
        toastAnimationExample = document.getElementById('toast-ex-danger');
        $('.toast-body').html(msg);
        $('.judultoaser').html(head);
    }

    toastAnimation = new bootstrap.Toast(toastAnimationExample);
    toastAnimation.show();
    console.log(toastAnimation);

}


