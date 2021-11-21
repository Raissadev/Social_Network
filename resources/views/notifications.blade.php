@extends('layouts.layout')

@section('content')

<main class="container-notifications min-h65-vh">
    <div class="wrap w90 center items-flex flex-wrap">
        <?php
            foreach ($friendsRequests as $friendRequest) {
                foreach($users as $user){
                    if($friendRequest->user_from == $user->id){
                        if($friendRequest->status != 'approved' && $friendRequest->status != 'reject'){
                            $user = DB::select('select * from users where id = :id', ['id' => $friendRequest->user_from]);
                            $user = $user[0];
        ?>
        <div class="box w23 text-center margin-right-default margin-down-default w95-device-small">
            <figure class="img-user-bigger margin-down-small">
                <img src="{{ url("storage/{$user->image}") }}" />
            </figure>
            <div>
                <a href="{{ route('profile', $user->id) }}"><h5>{{ $user->name }}</h5></a>
                <form action="{{ route('friend-request') }}" method="post" class="items-flex just-space-between align-center margin-top-small">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{ $friendRequest->id }}" />
                    <input type="hidden" name="user_to" value="{{ Session::get('id') }}" />
                    <input type="hidden" name="user_from" value="{{ $user->id }}" />
                    <input type="hidden" name="status" value="approved" />
                    <button name="status" value="approved" class="bgBlackWeakIn w80">Accept</button>
                    <button name="status" value="reject" class="bgBlackWeakIn"><i class="ri-close-line"></i></button>
                </form>
            </div>
        </div>
        <?php }}}} ?>
    </div>
</main>

@endsection


