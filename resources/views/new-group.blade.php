@extends('layouts.layout')

@section('content')

<main class="settings-container">
    
    <div class="wrap w80 center margin-down-default">
        <form method="post" action="{{ route('new-group-store') }}" enctype="multipart/form-data" class="box">
            @csrf
            <div class="w70 items-flex align-center center flex-wrap-device-small w100-device-small">
                <div class="w50 w100-device-small margin-down-small-device-small text-center-device-small">
                    <input type="text" name="name_community" class="bgBlackWeakIn margin-down-small w80" />
                    <div class="items-flex flex-wrap just-center-device-small">
                        <h5 class="w100 margin-down-small">Banner for Group</h5>
                        <label class="send-banner" name="image" for="image">
                            <input type="file" name="image" value="posts/hello-world.png" id="image" style="display:none" />
                            <i class="ri-landscape-line"></i>
                        </label>
                    </div>
                </div>
                <div class="text-center w50 w100-device-small">
                    <textarea name="description_community" placeholder="About Group" class="bgBlackWeakIn w80 margin-down-small"></textarea>
                    <input type="hidden" name="users" value="{{ Session::get('id') }}" />
                    <button class="bgBlackWeakIn w80 center">Create</button>
                </div>
            </div>
        </form>
    </div>

</main>

@endsection


