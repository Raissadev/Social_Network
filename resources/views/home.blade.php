@extends('layouts.layout')
<?php $image = Session::get('image'); ?>
@section('content')

<main class="items-flex w90 center just-space-between w95-device-small">

    <section class="container-menu w20 w100-device-small container-order">
        <div class="wrap items-flex just-space-between">
            <div class="row w100">
                <div class="item text-center margin-down-small">
                    <figure class="box-banner margin-down-small-in">
                        <img src="{{ asset('storage/images/bannerAccess.jpg') }}" />
                    </figure>
                    <h6>Seja bem vindo(a) {{ Session::get('name') }}</h6>
                </div>
                <div class="item margin-down-small">
                    @foreach($communitys as $groups)
                    <div class="margin-down-small">
                        <a href="{{ route('group', $groups->id) }}">
                            <figure class="box-banner margin-down-small-in">
                                <img src="<?php if($groups->image !== null){ echo url("storage/$groups->image"); }else{ echo url("storage/posts/hello-world.png"); } ?>" />
                            </figure>
                            <h5>{{ $groups->name_community }}</h5>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="container w50 w100-device-small">
        <div class="wrap">

            <section class="margin-down-default">
                <div class="title margin-down-small">
                    <h3>New Users</h3>
                </div>
                <div class="slide">
                    <ul class="storys items-flex">
                        @foreach ($lastUsers as $user)
                        @if($user->id != Session::get('id'))
                        <li>
                            <a href="{{ route('profile', $user->id) }}" class="text-center">
                                <figure>
                                    <img src="{{ url("storage/{$user->image}") }}" class="bgBlackWeakIn" />
                                </figure>
                                <h6>{{ $user->name }}</h6>
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </section>

            <section class="margin-down-small">
                <h3>Feed</h3>
            </section>

            <section class="container-form margin-down-small">
                <div class="row items-flex">
                    <figure class="img-user-default margin-right-small items-flex align-baseline">
                        <img src="{{ url("storage/{$image}") }}" />
                    </figure>
                    <form class="new-post w100 pos-relative" method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="title" placeholder="New post" class="w100" />
                        <textarea class="text-content hide" name="content" placeholder="Hello World"></textarea>
                        <div class="buttons items-flex">
                            <a class="button toggle"><i class="ri-text"></i></a>
                            <input type="file" name="image" id="image" style="display:none" />
                            <label for="image" class="button"><i class="ri-image-add-line"></i></label>
                            <button type="submit"><i class="ri-send-plane-line"></i></button>
                            <input type="hidden" name="user" value="{{ Session::get('email'); }}" />
                        </div>
                    </form>
                </div>
            </section>

            <section class="items">
                <?php
                    foreach ($posts as $post){
                        $user_find = $post->user;
                        $user = DB::select('select * from users where email = :email', ['email' => $user_find]);
                        $user = $user[0];
                ?>
                    @include('components.content-post')
                <?php } ?>
            </section>

        </div>
    </section>

    <section class="container w20 w100-device-small">
        <div class="wrap">
            
            <section class="notifications margin-down-default">
                <div class="wrap">
                    <div class="box">
                        <p>NOTIFICATIONS</p>
                        <?php
                        foreach($friendsRequests as $friendRequest) {
                        foreach($users as $user){
                            if($friendRequest->user_to == $user->id){
                            if($friendRequest->user_from != Session::get('id')){
                                if($friendRequest->status != 'approved' && $friendRequest->status != 'reject'){
                                    $user = DB::select('select * from users where id = :id', ['id' => $friendRequest->user_from]);
                                    $user = $user[0];
                        ?>
                        <div class="items-flex margin-top-small align-center">
                            <figure class="img-user-small margin-right-small items-flex align-center">
                                <img src="{{ url("storage/{$user->image}") }}" />
                            </figure>
                            <h6>{{ $user->name }} asked to be your friend</h6>
                        </div>
                         <?php }}}}} ?>
                         <?php
                        foreach($posts as $post) {
                            if($post->created_at >= date('Y-m-d')){
                        ?>
                        <div class="items-flex margin-top-small align-center">
                            <figure class="img-user-small margin-right-small items-flex align-center">
                                <img src="{{ url("storage/{$post->image}") }}" />
                            </figure>
                            <h6>New post: {{ $post->title }}</h6>
                        </div>
                         <?php }} ?>
                    </div>
                </div>
            </section>

            <section class="users">
                <div class="wrap">
                    <p>Friends</p>
                    <ul class="margin-top-small">
                        <?php
                        foreach ($friendsRequests as $friendRequest) {
                            foreach($users as $user){
                                if($friendRequest->user_from == $user->id){
                                    if($friendRequest->status == 'approved'){
                                        $user = DB::select('select * from users where id = :id', ['id' => $friendRequest->user_from]);
                                        $user = $user[0];
                        ?>
                        <li class="items-flex align-center margin-down-small">
                            <figure class="img-user-default margin-right-small items-flex align-center">
                                <img src="{{ url("storage/{$user->image}") }}" />
                            </figure>
                            <h6>{{ $user->name }}</h6>
                        </li>
                        <?php }}}} ?>
                    </ul>
                </div>
            </section>
            
        </div>
    </section>

</main>
@endsection