<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::with('projectInfo')->orderBy('id','DESC')->get();
        // return $users;
        $totalUser = count($users);
        return view('auth.userlist',compact('users','totalUser'));
    }
}
