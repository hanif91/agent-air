/**
 * Form Picker
 */

'use strict';


$(function () {
  // Bootstrap Datepicker
  // --------------------------------------------------------------------


  // Bootstrap Daterange Picker
  // --------------------------------------------------------------------
  var

    bsRangePickerRange = $('#bs-rangepicker-range')





  if (bsRangePickerRange.length) {
    bsRangePickerRange.daterangepicker({
      ranges: {
        'Hari Ini' : [moment(), moment()],
        'Kemarin' : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
        '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
        'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
        'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      locale: {
        format: 'YYYY-MM-DD'
      },
      opens: isRtl ? 'left' : 'right'
    });
  }


});
