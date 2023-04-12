@extends('layouts.app')

@section('title','Testing Html')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

        <div class="d-flex flex-row-reverse">
          <div class="col col-lg-2">
            1 of 3
          </div>
          <div class="col-md-auto">
            Variable width content
          </div>
          <div class="col col-lg-2">
            3 of 3
          </div>
        </div>
        <div class="row">
          <div class="col">
            1 of 3
          </div>
          <div class="col-md-auto">
            Variable width content
          </div>
          <div class="col col-lg-2">
            3 of 3
          </div>
        </div>

</div>
@endsection
