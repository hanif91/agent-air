{{--<script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>--}}
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.css') }}">
@endpush
<script>
    function fn_deleteData(url)
    {
        Swal.fire({
            title:"Yakin akan dihapus ?",
            text:"data akan dihapus secara permanent",
            icon:"warning",
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-primary me-3',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        }).then(function(res) {
            if(res.value){
                token = '{{csrf_token()}}';
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "_method": 'DELETE',
                        "_token": token,
                    },
                    success: function (respon){
                        console.log(respon);
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
                if(datatable !== undefined)
                    datatable.draw(true)
            }

        });
    }
</script>
