@extends('layouts.layout')

@section('content')

<main class="container-users">
    <div class="wrap items-flex flex-wrap w90 center">
        <?php
            foreach ($users as $user){
                if($user->id != Session::get('id')){
        ?>
        <div class="box text-center">
            <figure class="img-user-bigger margin-down-small text-center">
                <img src="{{ url("storage/{$user->image}") }}" />
            </figure>
            <div>
                <h5>{{ $user->name }}</h5>
                <form  method="post" action="{{ route('friend-store') }}" class="items-flex just-space-between align-center margin-top-small">
                    @csrf
                    <input type="hidden" name="user_to" value="{{ $user->id }}" />
                    <input type="hidden" name="user_from" value="{{ Session::get('id') }}" />
                    <input type="hidden" name="status" value="pending" />
                    <button class="bgBlackWeakIn w80">Add Friend</button>
                    <a href="{{ route('profile', $user->id) }}" class="button bgBlackWeakIn"><i class="ri-eye-line"></i></a>
                </form>
            </div>
        </div>
        <?php }} ?>
    </div>
</main>

@endsection


