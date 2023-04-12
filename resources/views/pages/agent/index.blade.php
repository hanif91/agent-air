@extends('layouts.app')

@section('title','Agent')
@section('content')
        <div class="container-xxl flex-grow-1 container-p-y">
    {{-- Breadcum  --}}
    <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';" class="text-muted">
        <h4 class="fw-light">
        <ol class="breadcrumb">


          <li class="breadcrumb-item active" aria-current="page">Data Agent</li>

        </ol>
    </h4>
    </nav>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Agent</h5>
                        <small class="text-muted float-end"><a href="{{ route("agent.create")  }}" class="btn btn-primary"><i class="bx bx-plus"></i> Tambah Data</a></small>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>alamat</th>
                                    <th class="text-nowrap">Harga</th>
                                    <th class="text-nowrap">Qty</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>

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
        processing: true,
        serverSide: true,
        responsive:true,
        ajax: '{!! route('agent.data') !!}',
        columns: [
            { data: 'id', name: 'id',render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'nama', name: 'nama' },
            { data: 'alamat', name: 'alamat' },
            { data: 'harga', name: 'harga' },
            { data: 'qty', name: 'qty' },
            { data: 'action', name: 'action' }
        ],
        render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }
    })
</script>

@include('includes.swal_delete')

@endpush

