@extends('layouts.app')

@section('title','Agent')

@section('content')
<div class="container">
    <h1>Laravel JQuery UI Autocomplete Search Example - ItSolutionStuff.com</h1>
    <input class="typeahead form-control" id="search" type="text">
</div>

@endsection

@push('css')

@endpush

@push('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
<script type="text/javascript">
    var path = "{{ route('autocomplete.search') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
@endpush;
