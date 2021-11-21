@extends('layouts.layout-access')

@section('content-access')

<section class="container-access items-flex just-center align-center">
    <div class="wrap w50 center w90-device-small">
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif
        <form method="POST" action="{{ route('verification.send') }}" class="box-access items-flex flex-wrap align-center just-center">
            <button class="bgBlackWeakIn w30">{{ __('Resend Verification Email') }}</button>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            <button type="submit" class="bgBlackWeakIn w30"> {{ __('Log Out') }}</button>
        </form>
    </div>
</section>

@endsection
        