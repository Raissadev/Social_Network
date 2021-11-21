<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\friendRequest;
use App\Models\User;
use App\Models\Post;

class FriendRequestController extends Controller{

    public static function addFriend(Request $request){
        $request->status = "pending";
        $data = $request->all();
        $add = friendRequest::create($data);
        return redirect()->route('community', $add);
    }

    public static function requestFriend(Request $request){ 
        $friend =  friendRequest::find($request->id);
        $friend->update($request->all());
        return redirect()->route('notifications');
    }

}
