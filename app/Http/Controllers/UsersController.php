<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        $user =  $user = Auth::user();
        
        return view('users.index', [
            'users' => $users,
            'user'  => $user,
        ]);
    }
    
      public function show($id)
    {
     $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        $count_microposts = $user->microposts()->count();
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }
      public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(1);
        
        $data = [
            'user' => $user,
            'users' => $followings,
        ];
        
        $data += $this->counts($user);
        
        return view('users.followings', $data);
    }
    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(1);
        
        $data = [
            'user' => $user,
            'users' => $followers,
        ];
        
        $data += $this->counts($user);
        
        return view('users.followers', $data);
    }
}