@extends('layouts.layout-access')

@section('content-access')

<section class="container-access items-flex just-center align-center">
    <div class="wrap w50 center w90-device-small">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="box-access items-flex flex-wrap align-center just-center">
            @csrf
            <input type="text" name="name" required autofocus :value="old('name')" />
            <input type="text" name="email" required autofocus :value="old('email')" />
            <input type="file" name="image" :value="old('image')" />
            <input type="password" name="password" autofocus required autocomplete="new-password" />
            <input type="password" name="password_confirmation" autofocus required autocomplete="password_confirmation" />
            <button class="bgBlackWeakIn w30">{{ __('Register') }}</button>
            <a class="w100 text-right" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </form>
    </div>
</section>

@endsection
        