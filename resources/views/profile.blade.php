@extends('layouts.layout')
<?php $image = Session::get('image'); ?>

@section('content')

<main class="container-profile margin-down-default">
    <div class="wrap w80 center w95-device-small">
        <div class="item-profile">
            <div style="background-image:url('<?php if($user->banner !== null){ echo url("$user->banner"); }else{ echo url("storage/posts/hello-world.png"); } ?>');" class="banner items-flex align-end">
                <div class="row w100 items-flex align-center flex-wrap">
                    <figure class="img-profile w15 margin-right-default">
                        <img src="{{ url("storage/{$user->image}") }}" />
                    </figure>
                    <div class="col w60-device-small">
                        <h3>{{ $user->name }}</h3>
                        <p>{{ $user->title_user }}</p>
                    </div>
                    <div class="col col-infos w100 items-flex just-end w95-device-small flex-wrap-device-small">
                        <ul class="menu w65 items-flex w100-device-small">
                            <li class="tab tabs--active"><a>Feed</a></li>
                            <li class="tab"><a>About</a></li>
                            <li class="tab"><a>Profission</a></li>
                        </ul>
                        <ul class="buttons w20 items-flex align-center just-end w100-device-small">
                            @if($user->id != Session::get('id'))
                            <form method="post" action="{{ route('friend-store') }}">
                                @csrf
                                <input type="hidden" name="user_to" value="{{ $user->id }}" />
                                <input type="hidden" name="user_from" value="{{ Session::get('id') }}" />
                                <li class="margin-right-small"><button name="status" value="pending" class="button bgBlackWeak"><i class="ri-add-line"></i></button></li>
                            </form>
                            @endif
                            <li class="margin-right-small"><a href="{{ route('settings-profile',  Session::get('id') ) }}" class="button bgBlackWeak"><i class="ri-settings-2-line"></i></a></li>
                            <li><a href="http://api.whatsapp.com/send?1=pt_BR&phone=55{{ $user->phone_number ?? old('phone_number') }}" class="button bgBlackWeak"><i class="ri-whatsapp-line"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<section class="container-infos-profile items-flex just-space-between w80 center flex-wrap-device-small w100-device-small">

    <section class="w25 w95-device-small container-order center-device-small">
        <div class="wrap">
            <div class="box">
                <div class="title margin-down-small">
                    <h4>Last Comments</h4>
                </div>
                <ul class="list margin-down-small">
                    @foreach ($posts as $post)
                    @foreach ($comments as $comment)
                    @if($post->user == $user->email)
                        <li><h6>{{ $comment->comment }}</h6></li>
                    @endif
                    @endforeach
                    @endforeach
                </ul>
                <ul class="list-infos-profile">
                    @foreach ($ProfessionalProfile as $ProfessionalProfile)
                    @if($ProfessionalProfile->user_id == $user->id)
                    <li class="margin-down-small items-flex align-center">
                        <h5>{{ $ProfessionalProfile->name_company }}</h5>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <section class="w70 w95-device-small margin-down-default-device-small center-device-small">

        @if(Session::get('email') == $user->email)
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
        @endif

        <section class="content content--active">
            <?php
                foreach ($posts as $post){
                    $user_find = $user->email;
                    $user = DB::select('select * from users where email = :email', ['email' => $user_find]);
                    $user = $user[0];
                    if($post->user === $user_find){
            ?>
                @include('components.content-post')
            <?php }} ?>
        </section>

        <section class="content">
            <div class="box">
                <p>{{ $user->about }}</p>
            </div>
        </section>

        <section class="content">
            <div class="box">
                <p>{{ $user->title_user }}</p>
            </div>
        </section>
        

    </section>

    
</section>

@endsection


