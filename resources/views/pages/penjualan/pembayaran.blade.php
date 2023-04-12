@extends('layouts.app')

@section('title','Pembayaran')
@section('content')
        <div class="container-xxl flex-grow-1 container-p-y">
            <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';" class="text-muted">
                <h4 class="fw-light">
                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="{{ route('penjualan.index') }}">Penjualan</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>

                </ol>
            </h4>
            </nav>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Penjualan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered datatable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th class="text-nowrap">Qty</th>
                                    <th class="text-nowrap">Harga</th>
                                    <th class="text-nowrap">total</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($table as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->agent->nama }}</td>
                                        <td>{{ number_format($item->qty) }}</td>
                                        <td>{{ number_format($item->harga) }}</td>
                                        <td>{{ number_format($item->total) }}</td>
                                        <td><a href='{{ route('pembayaran.bayar',$item) }}' class='btn btn-danger'  title=''>Bayar ?</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('assets/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
@endpush

@push('js')
     <script src="{{ asset('assets/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script>
    let datatable =
        $(".datatable").DataTable({
        language:{
            "info": "Data _START_ sampai _END_ dari _TOTAL_ data.",
        },
        processing: false,
        serverSide: false,
        responsive:true
    })
</script>

@include('includes.swal_delete')

@endpush

