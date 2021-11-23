@extends('layouts.layout')
<?php $image = Session::get('image'); ?>
@section('content')

<main class="container-group margin-down-default">
    <div class="wrap w80 center w95-device-small">
        <div class="box items-flex align-center pos-relative flex-wrap-device-small">
            <figure class="image-group-default w50 margin-right-default w100-device-small">
                <img src="<?php if($groups->image !== null){ echo url("storage/$groups->image"); }else{ echo url("storage/posts/hello-world.png"); } ?>" />
            </figure>
            <div class="w50 w100-device-small">
                <h1>{{ $groups->name_community ?? old('name_community') }}</h1>
                <h5>{{ $groups->description_community ?? old('description_community') }}</h5>
                <?php 
                    $tbUsers = DB::select("select * from communities");
                    $isUser = explode(',',$tbUsers[0]->users);
                    $isParticipant = array_search(Session::get('id'),$isUser);
                    if(!empty($isParticipant)){
                ?>
                <form  method="post" action="{{ route('groups-store', $groups->id) }}">
                    @csrf
                    @method('put')
                    <input type="hidden" name="name_community" value="{{ $groups->name_community }}" />
                    <input type="hidden" name="users" value="{{ Session::get('id') }}" />
                    <button class="bgBlackWeakIn w20 w30-device-small">Participar</button>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<section class="container-feed-group">
    <div class="wrap w80 center items-flex just-space-between w95-device-small flex-wrap-device-small">

        <section class="items w25 w100-device-small container-order">
            <div class="box">
                <div class="title margin-down-small">
                    <h4>Last Users</h4>
                </div>
                <ul class="list margin-down-small">
                    <?php $idUsers = explode(',',$groups->users); ?>
                    @foreach($users as $user)
                    @if($idUser = in_array($user->id, $idUsers))
                        <li class="margin-down-small">
                            <a href="{{ route('profile', $user->id) }}" class="items-flex align-center">
                                <figure class="img-user-small margin-right-small">
                                    <img src="{{ url("storage/{$user->image}") }}" />
                                </figure>
                                <h5>{{ $user->name }}</h5>
                            </a>
                        </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </section>
        
        <section class="items w70 w100-device-small margin-down-default-device-small">
            
            @if($idUsers = in_array(Session::get('id'), $idUsers))
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
                            <input type="hidden" name="group_id" value="{{ $groups->id }}" />
                            <label for="image" class="button"><i class="ri-image-add-line"></i></label>
                            <button type="submit"><i class="ri-send-plane-line"></i></button>
                            <input type="hidden" name="user" value="{{ Session::get('email'); }}" />
                        </div>
                    </form>
                </div>
            </section>
            @endif

            <?php
                foreach($posts as $post){
                if($post->group_id == $groups->id){
                    $users = DB::select("select * from users");
                    foreach ($users as $key => $user){
                        if($post->user === $user->email){
            ?>
                @include('components.content-post')
            <?php }}}} ?>

        </section>

    </div>
</section>

@endsection