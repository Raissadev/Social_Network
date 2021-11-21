@extends('layouts.layout')

@section('content')

<main class="settings-container">
    
    <div class="wrap w80 center margin-down-default w95-device-small">
        <form method="post" action="{{ route('user-store', $user->id) }}" enctype="multipart/form-data" class="box">
            @csrf
            @method('put')
            <div class="w70 items-flex align-center center w100-device-small flex-wrap-device-small">
                <div class="w50 w100-device-small margin-down-small-device-small">
                    <input type="text" name="name" value="{{ $user->name ?? old('name') }}" class="bgBlackWeakIn margin-down-small w80" />
                    <input type="password" name="password" value="{{ $user->password ?? old('password') }}" class="bgBlackWeakIn margin-down-small w80" />
                    <div class="items-flex flex-wrap">
                        <h5 class="w100 margin-down-small">Banner for Profile</h5>
                        <label class="send-banner" name="banner" for="banner">
                            <input type="file" name="banner" value="posts/hello-world.png" id="banner" style="display:none" />
                            <i class="ri-landscape-line"></i>
                        </label>
                    </div>
                </div>
                <div class="text-center w100-device-small">
                    <figure class="img-user-bigger margin-left-default margin-down-small">
                        <label for="image">
                            <img src="{{ url("storage/{$user->image}") }}" />
                            <input type="file" name="image" id="image" value="{{ $user->image ?? old('image') }}" style="display:none" />
                        </label>
                    </figure>
                    <input type="hidden" name="id" value="{{ $user->id }}" />
                    <button class="bgBlackWeakIn w80 center">Update</button>
                </div>
            </div>
        </form>
    </div>

    <div class="wrap w80 center margin-down-default w95-device-small">
        <form method="post" action="{{ route('add-about-user', $user->id) }}" class="box">
            @csrf
            @method('put')
            <div class="w70 items-flex center w100-device-small flex-wrap-device-small">
                <div class="w60 w100-device-small margin-down-small-device-small">
                    <textarea name="about" class="bgBlackWeakIn w90 w100-device-small" placeholder="About you">{{ $user->about ?? old('about') }}</textarea>
                </div>
                <div class="w40 w100-device-small">
                    <input type="hidden" name="id" value="{{ $user->id }}" />
                    <input type="text" name="title_user" value="{{ $user->title_user ?? old('title_user') }}" class="bgBlackWeakIn margin-down-small w100" placeholder="Title for bio" />
                    <input type="text" size="11" onKeyUp="maskNumber(this, event)" name="phone_number" value="{{ $user->phone_number ?? old('phone_number') }}" class="bgBlackWeakIn margin-down-small w100" placeholder="Number Phone" />
                    <button class="bgBlackWeakIn w100 center">Update</button>
                </div>
            </div>
        </form>
    </div>

    <div class="wrap w80 center margin-down-default">
        <form method="post" action="{{ route('settings-profile-professional', $user->id) }}" class="box">
            @csrf
            <div class="w70 items-flex center w100-device-small flex-wrap-device-small">
                <div class="w60 w100-device-small">
                    <input type="text" name="name_company" value="{{ $user->name_company ?? old('name_company') }}" placeholder="Name company" class="bgBlackWeakIn margin-down-small w90 w100-device-small" />
                </div>
                <div class="w40 items-flex w100-device-small">
                    <input type="hidden" name="user_id" value="{{ $user->id }}" />
                    <button class="bgBlackWeakIn w100 center">Create</button>
                </div>
            </div>
        </form>
    </div>

</main>

@endsection


