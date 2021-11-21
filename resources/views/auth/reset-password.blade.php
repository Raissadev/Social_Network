@extends('layouts.layout-access')

@section('content-access')

<section class="container-access items-flex just-center align-center">
    <div class="wrap w50 center w90-device-small">
        <form method="POST" action="{{ route('password.update') }}" class="box-access items-flex flex-wrap align-center just-center">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @csrf
            <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            <input id="password" type="password" name="password" required autocomplete="current-password" />
            <input id="password_confirmation" type="password" name="password_confirmation" required />
            <button class="bgBlackWeakIn w30">{{ __('Reset Password') }}</button>
        </form>
    </div>
</section>

@endsection
        