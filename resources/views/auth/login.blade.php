@extends('layouts.layout-access')

@section('content-access')


<section class="container-access items-flex just-center align-center">
    <div class="wrap w50 center w90-device-small">
        <form method="POST" action="{{ route('login') }}" class="box-access items-flex flex-wrap align-center just-center">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @csrf
            <input type="text" name="email" required autofocus :value="old('email')" />
            <input type="password" name="password" required autocomplete="current-password" />
            <div class="w100 margin-down-small items-flex align-center">
                <input id="remember_me" type="checkbox" class="margin-right-small" name="remember">
                <span><h6>{{ __('Remember me') }}</h6></span>
            </div>
            <button class="bgBlackWeakIn w30 margin-down-small-device-small">{{ __('Log in') }}</button>
            @if (Route::has('password.request'))
                <a class="w100 text-right" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </form>
    </div>
</section>
@endsection
        