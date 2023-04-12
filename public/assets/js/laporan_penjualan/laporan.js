'use strict';

var cekFlaglunas = $("#cekflaglunas");
var bodyLaporan = $("#bodylaporan");
var headerLap = $("#headerlap");
var btnTampilkan = $("#btntampilkan");
var btnPrint = $("#btnprint");
var selFlaglunas = $("#selectflaglunas");
var stateCheckLunas = '0';
var countData = 0;
const urlcss = $("#urlprintcss").val();


$(document).ready(function(){

    kondisiawal();
});



btnTampilkan.on('click',( function()
{
tampilkan();
tampilkanajax();
}));

btnPrint.on('click',( function()
{
    if (countData > 0) {
        $('#bodylaporan').printThis({
            importCSS: false,
            loadCSS: urlcss,
            printDelay : 250,
            importStyle : true
        });
    } else {
        fntoast('warning','Print Data','Tidak ada data yang bisa ditampilkan');
    }
}));


function kondisiawal(){

    bodyLaporan.hide();
    headerLap.attr('style','max-height : 21cm; min-height : 10cm; overflow-y: hidden; overflow-x: hidden')
    cekFlaglunas.prop('checked',false);
    stateCheckLunas = '0';
    selFlaglunas.prop('disabled', true);

};

function tampilkan(){
    headerLap.attr('style','max-height : 21cm; min-height : 10cm; overflow-y: scroll; overflow-x: scroll')
    bodyLaporan.show(500);
};


function tampilkanajax(){
    //const token = $("#csrftoken").val();
    const url = $("#urlfilterdata").val();
    const tgl1 = $('#bs-rangepicker-range').val();
    const periodetext =  maskingbulanrange(tgl1)
    let varflaglunas = selFlaglunas.val();
    let valflaglunas = "";
    let jumlahtotal = 0;

    if (varflaglunas == "") {
        varflaglunas = "0";
    };

    valflaglunas = stateCheckLunas + " - " + varflaglunas;

    // console.log(valflaglunas)
    $.ajax({
        url: url+ '/' + tgl1 + '/' + valflaglunas,
        type: 'GET',
        dataType: "JSON",
        success: function (respon){
            // console.log(respon);
            $('#bodydata').empty();
            jumlahtotal = 0;
            let no = 0;
            $.each(respon, function( key , val){
                no = key+1;

                let row = "<tr class='p-1 m-1'>"+
                "<td class='pb-0 pt-0 m-0 text-center'>"+no+"</td>"+
                "<td class='pb-0 pt-0 m-0 text-nowrap text-left'>"+val.agent.nama+"</td>"+
                "<td class='pb-0 pt-0 m-0 text-end'>"+formatRupiah(val.harga)+"</td>"+
                "<td class='pb-0 pt-0 m-0 text-center'>"+formatRupiah(val.qty)+"</td>"+
                "<td class='pb-0 pt-0 m-0 text-end'>"+formatRupiah(val.total)+"</td>"+
                "</tr>";
                jumlahtotal += parseInt(val.total);
                $('#bodydata').append(row);

            });
            countData = no;
            let summarihtml = "<tr>"+
                "<td colspan='4' class='text-center fw-bold'>"+'TOTAL'+"</td>"+
                "<td class='text-end fw-bold'> "+formatRupiah(jumlahtotal)+"</td>"+
                "</td>";
            $('#bodydata').append(summarihtml);
            $('#periode').html(periodetext);

        },
        error: function(xhr) {
            console.log(xhr);
            $('#bodydata').empty();
            $('#periode').val('Periode');
            countData = 0;
        }

    });
};

cekFlaglunas.on('click',( function()
{
    if (cekFlaglunas.is(':checked')) {
        stateCheckLunas = '1';
        selFlaglunas.prop('disabled', false);
    } else {
        stateCheckLunas = '0';
        selFlaglunas.prop('disabled', true);
    }

}));

