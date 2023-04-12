@extends('layouts.app')

@section('title','Laporan Penjualan')
@section('content')
    @include('includes.toastblade');
  <div class="container-xxl flex-grow-1 container-p-y">
    {{-- Breadcum  --}}
    <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';" class="text-muted">
        <h4 class="fw-light">
        <ol class="breadcrumb">

          <li class="breadcrumb-item"><a href="{{ route('penjualan.index') }}">Penjualan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Laporan Penjualan</li>

        </ol>
    </h4>
    </nav>
    <input type="hidden" id="urlfilterdata" value="{{ route('laporan_penjualan.filter_data',['','']) }}">
    <input type="hidden" id="urlprintcss" value="{{ asset('assets/libs/bootstrap-5.0.2-dist/css/bootstrap.css') }}">
     <div class="row invoice-preview">
         {{-- Invoice Page --}}

        <div id="headerlap" class="col-xl-9 col-md-8 col-12 mb-md-0 mb-3" style="max-height : 23cm; overflow-y: scroll; overflow-x: scroll;">
            <div class="card invoice-preview-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Preview Laporan</h5>
                    <button id="btnprint" type="button" class="btn rounded-pill btn-primary">
                        <span class="tf-icons bx bxs-printer me-1"></span>Print</button>
                </div>
                <div id="bodylaporan">
                    <div class="card-body pb-0">
                        <div class="">
                            <div class="mb-xl-0 ">
                                <div class="d-flex svg-illustration mb-3 gap-2">

                                    <svg
                                        width="26px"
                                        height="26px"
                                        viewBox="0 0 26 26"
                                        version="1.1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                    >
                                    <title>icon</title>
                                    <defs>
                                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-1">
                                        <stop stop-color="#5A8DEE" offset="0%"></stop>
                                        <stop stop-color="#699AF9" offset="100%"></stop>
                                        </linearGradient>
                                        <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="linearGradient-2">
                                        <stop stop-color="#FDAC41" offset="0%"></stop>
                                        <stop stop-color="#E38100" offset="100%"></stop>
                                        </linearGradient>
                                    </defs>
                                        <g id="Pages" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Login---V2" transform="translate(-667.000000, -290.000000)">
                                        <g id="Login" transform="translate(519.000000, 244.000000)">
                                            <g id="Logo" transform="translate(148.000000, 42.000000)">
                                            <g id="icon" transform="translate(0.000000, 4.000000)">
                                                <path
                                                d="M13.8863636,4.72727273 C18.9447899,4.72727273 23.0454545,8.82793741 23.0454545,13.8863636 C23.0454545,18.9447899 18.9447899,23.0454545 13.8863636,23.0454545 C8.82793741,23.0454545 4.72727273,18.9447899 4.72727273,13.8863636 C4.72727273,13.5423509 4.74623858,13.2027679 4.78318172,12.8686032 L8.54810407,12.8689442 C8.48567157,13.19852 8.45300462,13.5386269 8.45300462,13.8863636 C8.45300462,16.887125 10.8856023,19.3197227 13.8863636,19.3197227 C16.887125,19.3197227 19.3197227,16.887125 19.3197227,13.8863636 C19.3197227,10.8856023 16.887125,8.45300462 13.8863636,8.45300462 C13.5386269,8.45300462 13.19852,8.48567157 12.8689442,8.54810407 L12.8686032,4.78318172 C13.2027679,4.74623858 13.5423509,4.72727273 13.8863636,4.72727273 Z"
                                                id="Combined-Shape"
                                                fill="#4880EA"
                                                ></path>
                                                <path
                                                d="M13.5909091,1.77272727 C20.4442608,1.77272727 26,7.19618701 26,13.8863636 C26,20.5765403 20.4442608,26 13.5909091,26 C6.73755742,26 1.18181818,20.5765403 1.18181818,13.8863636 C1.18181818,13.540626 1.19665566,13.1982714 1.22574292,12.8598734 L6.30410592,12.859962 C6.25499466,13.1951893 6.22958398,13.5378796 6.22958398,13.8863636 C6.22958398,17.8551125 9.52536149,21.0724191 13.5909091,21.0724191 C17.6564567,21.0724191 20.9522342,17.8551125 20.9522342,13.8863636 C20.9522342,9.91761479 17.6564567,6.70030817 13.5909091,6.70030817 C13.2336969,6.70030817 12.8824272,6.72514561 12.5388136,6.77314791 L12.5392575,1.81561642 C12.8859498,1.78721495 13.2366963,1.77272727 13.5909091,1.77272727 Z"
                                                id="Combined-Shape2"
                                                fill="url(#linearGradient-1)"
                                                ></path>
                                                <rect
                                                id="Rectangle"
                                                fill="url(#linearGradient-2)"
                                                x="0"
                                                y="0"
                                                width="7.68181818"
                                                height="7.68181818"
                                                ></rect>
                                            </g>
                                            </g>
                                        </g>
                                        </g>
                                    </g>
                                    </svg>
                                    {{-- End Icon --}}
                                    <span class="app-brand-text h3 mb-0 fw-bold">
                                        {{ $pengaturanall->headerlap1 }}
                                    </span>

                                </div>
                                <p class="mb-1">{{ $pengaturanall->alamat1 }}</p>
                                <p class="mb-1">{{ $pengaturanall->alamat2 }}</p>
                            </div>
                        </div>

                    </div>

                    {{-- <hr class="mt-1 mb-1" style="--bdtop: 3px solid;">
                    <hr class="mt-0 mb-6" style="--bdtop: 5px solid;"> --}}
                    <div class="mt-2 mb-1" style="border-top: 2px solid #000 !important; width: 100%"></div>
                    <div class="mb-2 mb-2" style="border-top: 5px solid #000 !important; width: 100%"></div>
                    <h3 class="mb-0"><p class="mb-0" style="text-align: center;">Laporan Penjualan</p></h3>
                    <p id="periode" name="periode" class="mb-4" style="text-align: center;">Periode</p>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered m-0">
                            <thead>
                                <tr>
                                    <th width="50px">No.</th>
                                    <th>Nama Agent</th>
                                    <th width="150px" style="text-align:right">Harga</th>
                                    <th width="50px">Qty</th>
                                    <th style="text-align:right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody id="bodydata">



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
          {{-- end Invoice Page --}}
          {{-- Filter Page --}}
        <div class="col-xl-3 col-md-4 col-12 invoice-actions">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h6 class="mb-0">Filter Data</h6>
                </div>

                <div class="card-body">
                    <label for="bs-rangepicker-range" class="form-label d-grid w-100 mb-3 d-flex align-items-center">Tanggal Penjualan</label>
                    <input type="text" id="bs-rangepicker-range" class="form-control d-grid w-100 mb-3 d-flex align-items-center">

                    <div class="form-check form-check-primary mt-3 mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="cekflaglunas" checked="false">
                        <label class="form-check-label" for="cekflaglunas">Status Bayar</label>
                    </div>
                    <select class="form-select select2 d-grid w-100 mb-3 d-flex align-items-center" id="selectflaglunas" aria-label="Default select example">
                        <option selected="">Pilih Status Bayar</option>
                        <option value="0">Belum Lunas</option>
                        <option value="1">Sudah Lunas</option>
                      </select>
                    <button id="btntampilkan" type="button" class="btn btn-primary d-grid w-100 mb-3">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bxs-filter-alt bx-xs me-1"></i>Tampilkan</span>

                    </button>
{{--
                    <a class="btn btn-label-secondary d-grid w-100 mb-3" target="_blank" href="{{ route('print_penjualan') }}">
                        Print
                    </a> --}}
                </div>
            </div>
        </div>
     </div>
  </div>


@endsection

@push('css')
{{--
<link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.scss') }}" /> --}}
<link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/libs/select2/select2.css')  }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/app-invoice.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('assets/css/pages/app-invoice-print.css') }}"> --}}


@endpush


@push('js')
{{-- <script src="{{ asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script> --}}
<script src="{{ asset('assets/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
<script src="{{ asset('assets/libs/select2/select2.js') }}"></script>



<script src="{{ asset('assets/js/pub/forms-pickers.js') }}"></script>
<script src="{{ asset('assets/js/pub/formatrupiah.js') }}"></script>
<script src="{{ asset('assets/js/pub/fntoas.js') }}"></script>
<script src="{{ asset('assets/js/printThis.js') }}"></script>
<script src="{{ asset('assets/js/laporan_penjualan/laporan.js') }}"></script>


@endpush

