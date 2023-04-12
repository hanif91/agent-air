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
        $('.judultoaser').html(head);
    } else {
        toastAnimationExample = document.getElementById('toast-ex-danger');
        $('.toast-body').html(msg);
        $('.judultoaser').html(head);
    }

    toastAnimation = new bootstrap.Toast(toastAnimationExample);
    toastAnimation.show();

}
