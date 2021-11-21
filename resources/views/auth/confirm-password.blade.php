@extends('layouts.layout-access')

@section('content-access')

<section class="container-access items-flex just-center align-center">
    <div class="wrap w50 center w90-device-small">
        <form method="POST" action="{{ route('password.confirm') }}" enctype="multipart/form-data" class="box-access items-flex flex-wrap align-center just-center">
            @csrf
            <input id="password" type="password" name="password" required autocomplete="current-password" />
            <button class="bgBlackWeakIn w30">{{ __('Confirm') }}</button>
        </form>
    </div>
</section>

@endsection
        