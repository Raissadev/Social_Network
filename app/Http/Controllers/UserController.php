<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\friendRequest;
use App\Models\Comments;
use App\Models\ProfessionalProfile;
use Illuminate\Support\Str;
use App\Models\Community;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{

    public function index(){
        $lastUsers = User::paginate(6);
        $users = User::get();
        $posts = Post::get();
        $comments = Comments::get();
        $friendRequest = friendRequest::get();
        $communitys = Community::get();
        return view('home', [ 'posts' => $posts, 'users' => $users, 'friendsRequests' => $friendRequest, 'comments' => $comments, 'communitys' => $communitys, 'lastUsers' => $lastUsers ]);
    }

    public function profile($id){
        $posts = Post::get();
        $users = User::get();
        $user = User::find($id);
        $ProfessionalProfile = ProfessionalProfile::get();
        $comments = Comments::get();
        return view('profile', [ 'posts' => $posts, 'user' => $user, 'users' => $users, 'comments' => $comments, 'ProfessionalProfile' => $ProfessionalProfile ]);
    }

    public function settingsProfile($id){
        $ProfessionalProfile = ProfessionalProfile::find($id);
        $user = User::find($id);
        return view('settings-profile', [ 'user' => $user, 'ProfessionalProfile' => $ProfessionalProfile ]);
    }

    public function community(){
        $friendRequest = friendRequest::get();
        $users = User::get();
        return view('community', [ 'users' => $users, 'friendsRequests' => $friendRequest ]);
    }

    public function notifications(){
        $users = User::get();
        $friendsRequests = friendRequest::get();
        return view('notifications', [ 'friendsRequests' => $friendsRequests, 'users' => $users ]);
    }

    public function store(Request $request, $id){
        if($request->banner){
            $banner = $request->banner->store('banners');
            $request->banner = $banner;
        }
        if($request->image){
            $image = $request->image->store('users');
            $request->image = $image;
        }
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route("home")->with('message', 'Perfil editado com sucesso');
    }

    public function addAboutUser(Request $request){
        $user =  User::find($request->id);
        $user->update($request->all());
        return redirect()->route('home')->with('message', 'Perfil editado com sucesso');
    }

    public function addCompany(Request $request){
        $data = ProfessionalProfile::find($request->id);
        $ProfessionalProfile = ProfessionalProfile::create($request->all());
        return redirect()->route('home', $ProfessionalProfile);
    }

    public function searchStore(Request $request){
        $data = $request->all();
        $query = '';
        if(isset($_POST['search'])){
            $name = $_POST['name'];
            $query = "WHERE name LIKE '$name%'";
        }
        $users = DB::select("select * from users");
        return $users;
    }

}
