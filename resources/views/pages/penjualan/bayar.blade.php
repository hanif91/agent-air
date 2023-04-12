@extends('layouts.app')

@section('title','Agent')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';" class="text-muted">
            <h4 class="fw-light">
            <ol class="breadcrumb">

              <li class="breadcrumb-item"><a href="{{ route('penjualan.index') }}">Penjualan</a></li>
              <li class="breadcrumb-item"><a href="{{ route('pembayaran') }}">Pembayaran</a></li>
              <li class="breadcrumb-item active" aria-current="page">Bayar</li>

            </ol>
        </h4>
        </nav>


        {{-- <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light " > <a href="{{ route('penjualan.index') }}" class="link-secondary">Penjualan</a> / </span>
            <span class="text-muted fw-light " > <a href="{{ route('penjualan.pembayaran') }}" class="link-secondary"> Pembayaran</a> /</span>
            <span >Bayar
        </h4> --}}
        <div class="row">
            <form action="{{ route('pembayaran.save',$penjualan) }}" method="POST" id="formstore">
                @csrf
                @method('POST')
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Proses Pembayaran</h5>
                            <button type="submit" class="btn rounded-pill btn-success">
                            <span class="tf-icons bx bxs-save me-1"></span>Bayar ?</button>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="namaagent" class="col-sm-12 col-md-2 col-lg-1 col-form-label">Nama</label>
                                <div class="col-sm-12  col-md-10 col-lg-11">
                                    <input type="text" class="form-control" id="namaagent" value="{{ $penjualan->agent->nama }}" disabled readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="qty" class="col-sm-12 col-md-2 col-lg-1 col-form-label">Jml Galon</label>
                                <div class="col-sm-12 col-md-1 col-lg-2">
                                    <input type="text" class="form-control" id="qty" value="{{ $penjualan->qty }}" disabled readonly>
                                </div>

                                <label for="harga" class="col-sm-12 col-md-1 col-lg-1 col-form-label">Harga Jual</label>
                                <div class="col-sm-12 col-md-3 col-lg-3" >
                                    <input type="text" class="form-control" id="harga" value="{{ number_format($penjualan->harga) }}" disabled readonly>
                                </div>

                                <label for="total" class="col-sm-12 col-md-1 col-lg-1 col-form-label">Total</label>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <input type="text" class="form-control" id="total" value="{{ number_format($penjualan->total) }}" disabled readonly>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection

@push('css')

@endpush

@push('js')


@include('includes.swal_delete')

@endpush

