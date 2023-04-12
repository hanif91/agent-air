@extends('layouts.app')

@section('title','Agent')
@section('content')
@php
    $routepost = request()->routeIs('agent.create')? route('agent.store') : route('agent.update',$agent);
    $methodpost = request()->routeIs('agent.create')? 'POST' : 'PUT';
    $titleform = request()->routeIs('agent.create')? 'Tambah Data' : 'Koreksi Data';
@endphp

    <div class="container-xxl flex-grow-1 container-p-y">
    {{-- Breadcum  --}}
    <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';" class="text-muted">
        <h4 class="fw-light">
        <ol class="breadcrumb">

          <li class="breadcrumb-item"><a href="{{ route('agent.index') }}">Data Agent</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $titleform }}</li>

        </ol>
    </h4>
    </nav>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
            <h5 class="card-header">Detail Agent</h5>
              <div class="card-body">


                <form id="formValidationExamples" class="row g-3" method="POST" action="{{ $routepost }}">
                    @csrf
                    @method($methodpost)
                    <div class="col-12">

                    </div>
                    <div class="mb-3 row">
                        {{-- <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label> --}}
                        <label class="col-md-1 col-form-label" for="nama">nama</label>
                        <div class="col-md-11">
                        <input
                          type="text"
                          id="nama"
                          class="form-control"
                          placeholder="Agent NU"
                          name="nama"
                          maxlength="50"
                          value="{{ $agent->nama??'' }}"
                        />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-1 col-form-label" for="alamat">Alamat</label>
                        <div class="col-md-11">
                        <textarea
                          id="alamat"
                          class="form-control"

                          name="alamat"
                          placeholder="Jalan Ahmad Yani"
                          rows="3"
                        >{{ $agent->alamat??'' }}</textarea>
                        </div>
                    </div>
                    {{-- <div class="col-md-6">

                        <label class="col-sm-2 form-label" for="formValidationHarga">Set Harga Penjualan</label>
                        <input
                          id="formValidationHarga"
                          class="form-control"
                          placeholder="5000"
                          type="number"
                          value="0"
                          name="formValidationHarga"
                        />
                    </div> --}}
                    <div  class="mb-3 row">
                    <label class="col-md-1 col-form-label" for="ribuan">Harga</label>
                    <div class="col-md-11">
                        <input
                        type="text"
                        id="ribuan"
                        class="form-control ribuan"
                        placeholder="Set Harga Jual Khusus Penjualan Agen"
                        name="harga"
                        maxlength="12"
                        value="{{ number_format($agent->harga??0)  }}"
                        />
                    </div>
                    </div>
                    <div  class="mb-3 row">
                        {{-- <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label> --}}
                        <label class="col-md-1 col-form-label" for="qty">Stock Galon</label>
                        <div class="col-md-11">
                            <input
                            id="qty"
                            class="form-control"
                            placeholder="0"
                            name="qty"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type="number"
                            maxlength="3"
                            value="{{ $agent->qty??'0' }}"


                            />
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submitButton" class="submit btn btn-primary float-end">Simpan</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /FormValidation -->
    </div>

@endsection

@push('css')


<link rel="stylesheet" href="{{ asset('assets/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/libs/tagify/tagify.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/libs/formvalidation/dist/css/formValidation.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/libs/toastr/toastr.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/libs/animate-css/animate.css') }}" />

@endpush

@push('js')


<script src="{{ asset('assets/libs/typeahead-js/typeahead.js') }}"></script>

<script src="{{ asset('assets/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('assets/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
<script src="{{ asset('assets/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('assets/libs/tagify/tagify.js') }}"></script>

<!--vendors JS -->

<!-- Page JS -->
<script src="{{ asset('assets/js/validation-agent.js') }}"></script>

<!-- numeral thousand -->
<script>
(function () {
    const numeralMask = document.querySelector('.ribuan');


  //Numeral
  if (numeralMask) {
    const numccs = new Cleave(numeralMask,
    {
      numeral: true,
      numeralThousandsGroupStyle: 'thousand',
    });
  }


})();
</script>

@endpush
