@extends('layouts.app')

@section('title','Penjualan')
@push('css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('assets/libs/datatables-bs5/datatables.bootstrap5.css') }}" />

<link rel="stylesheet" href="{{ asset('assets/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/libs/select2/select2.css') }}" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y border-2">

        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';" class="text-muted">
            <h4 class="fw-light">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Transaksi Penjualan</li>

            </ol>
        </h4>
        </nav>

        <!-- Basic Layout -->
        <div class="card mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex flex-row-reverse">

                        <h2 class="m-2 p-2 text-right bg-success fw-bolder" id="grandTotal">
                                GRAND TOTAL
                                :
                                Rp. 0,-</h2>
                        <input type="hidden" name="grandtotal" id="grandtotalval">
                        <input type="hidden" name="urltes" id="urltes" value="{{ route('agent.search') }}">
                    </div>
                    <!-- end of alert -->

                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-sm table-hover table-striped table-bordered mb-3">
                                <thead>
                                    <tr>

                                        <td width="282px" colspan="">
                                            <input type="text" class="form-control select2"
                                                placeholder="Nama Agent" autofocus id="nama_agent"
                                                value="" tabindex="1">

                                            <input type="hidden" class="form-control" id="id_agent"
                                                value="">


                                            {{-- <input type="hidden" class="form-control" id="input_kode2" value=""> --}}

                                            <input type="hidden" class="form-control" placeholder="stock"
                                                id="stok_head" disabled>

                                            <input type="hidden" id="qtyselisih" value="">
                                        </td>

                                        <td width="150px">
                                            <input type="hidden" id="harga_head" value="">

                                            <input type="text" class="form-control" placeholder="Rp(harga)"
                                                id="harga_head_tampil" disabled style="cursor: not-allowed;">

                                        </td>

                                        <td width="83px">
                                            <input type="number" class="hanya-angka form-control" id="qty_head"
                                                placeholder="Qty" value="" min="1" tabindex="2" disabled
                                                style="cursor: not-allowed;">
                                        </td>

                                        <td width="160px">
                                            <input type="hidden" value="" id="subtotal_head">

                                            <input type="text" class="form-control" placeholder="Rp(subtotal)"
                                                value="" id="subtotal_head_tampil" disabled
                                                style="cursor: not-allowed;">
                                        </td>

                                        <td width="35px">
                                            <button class="btn btn-primary" id="btnAdd" tabindex="3" disabled>
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="table-responsive">


                        <table id="tblTransaksi"
                            class="table table-sm table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="25px">No.</th>

                                    <th>Nama Agent</th>
                                    <th width="85x" style="display:none">agent_id</th>
                                    <th width="150px">harga satuan</th>
                                    <th width="150px" style="display:none">harga</th>
                                    <th width="85x" style="display:none">qtyss</th>
                                    <th width="85x">qty</th>
                                    <th width="160px">subtotal</th>
                                    <th width="85x" style="display:none">total</th>
                                    <th width="35px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyTransaksi">

                            </tbody>
                        </table>
                    </div>


                </div>    <!-- end of row -->

            </div>
            <form action="{{ route('penjualan.store') }}" method="POST" id="formstore">
                @csrf
                @method('POST')
                <div class="row justify-content-between m-2">
                    <div class="col-lg-4 d-grid gap-2 form-group">
                        <button class="btn  btn-danger btn-block" id="btnBatal">
                            <i class="fa fa-trash me-2"></i>Kosongkan Semua
                        </button>


                    </div>
                    <div class="col-4 d-grid gap-2 form-group ">
                        <button class="btn btn-primary " id="btnSimpan" disabled type="submit"
                        style="cursor: not-allowed;">
                        <i class="fa fa-save me-2"></i>Simpan </button>

                    </div>



                </div>
                <input type="hidden" name="data" value="" id="data"/>
            </form>
        </div>
    </div>
@endsection

@push('css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('assets/libs/datatables-bs5/datatables.bootstrap5.css') }}" />

{{-- <link rel="stylesheet" href="{{ asset('assets/libs/datatables-bs5/datatables.bootstrap5.css') }}" /> --}}
<link rel="stylesheet" href="{{ asset('assets/libs/select2/select2.css') }}" />
@endpush

@push('js')
<script src="{{ asset('assets/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('assets/libs/select2/select2.js') }}"></script>

<script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.tabletojson.min.js') }}"></script>

<script src="{{ asset('assets/js/trans.js') }}"></script>



@include('includes.swal_delete')

@include('includes.toastblade')
@endpush

