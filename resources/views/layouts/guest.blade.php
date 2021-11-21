@extends('layouts.layout-access')

@section('content-access')


<section class="container-access items-flex just-center align-center">
    <div class="wrap w50 center w90-device-small">
        {{ $slot }}
    </div>
</section>

<script src="{{ asset('js/app.js') }}" defer></script>

@endsection
        
