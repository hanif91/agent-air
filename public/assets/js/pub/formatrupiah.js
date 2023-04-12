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


function maskingbulanrange(periode) {
    const bulan = new Map([
        ["01","Januari"],
        ["02","Februari"],
        ["03","Maret"],
        ["04","April"],
        ["05","Mei"],
        ["06","Juni"],
        ["07","Juli"],
        ["08","Agustus"],
        ["09","September"],
        ["10","Oktober"],
        ["11","November"],
        ["12","Desember"]
    ]);

    let bln,thn,tgl,tglawal,tglakhir,periodefinal;
    tgl = periode.substr(8,2);
    bln = bulan.get(periode.substr(5,2));
    thn = periode.substr(0,4);
    tglawal = tgl + ' ' + bln + ' ' + thn;

    tgl = periode.substr(21,2);
    bln = bulan.get(periode.substr(18,2));
    thn = periode.substr(13,4);

    tglakhir = tgl + ' ' + bln + ' ' + thn;

    return tglawal + ' - ' +tglakhir;
}
