<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comments;
use App\Models\Community;
use Illuminate\Support\Str;
use Session;

class CommunityController extends Controller
{
    
    public function participateInTheCommunity(Request $request, $id){
        $participant =  Community::find($request->id);
        $users = explode(',',$request->users);
        $request->users = $users;
        if($participant){
            Session::put('participant', $request->name_community);
        }
        $participant->update($request->all());
        return redirect()->route('home');
    }

    public function createNewCommunity(Request $request){
        $data = $request->all();
        if($request->image->isValid()){
            $nameFile = Str::of($request->name_community)->slug('-') . '.' .$request->image->getClientOriginalExtension();
            $image = $request->image->storeAs('groups', $nameFile);
            $data['image'] = $image;
        }
        $participant = Community::create($data);
        return redirect()->route('new-group', $participant);
    }

    public function getCommunitys($id){
        $groups = Community::find($id);
        $posts = Post::get();
        $comments = Comments::get();
        $users = User::get();
        return view('group', [ 'groups' => $groups, 'posts' => $posts, 'users' => $users, 'comments' => $comments ]);
    }

    public function newGroup(){
        $users = User::get();
        return view('new-group', [ 'users' => $users ]);
    }

}
