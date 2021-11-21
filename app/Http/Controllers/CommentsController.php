<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Post;
use Session;

class CommentsController extends Controller
{
    
    public function store(Request $request){
        $data = $request->all();
        if($request->user){
            $data['user_id'] = Session::get('email');
        }
        $comment = Comments::create($data);
        return redirect()->route('home', $comment);
    }

}
