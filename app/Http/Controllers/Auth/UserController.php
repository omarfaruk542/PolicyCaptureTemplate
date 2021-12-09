<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $users = User::orderBy('id','DESC')->with('projectInfo')->get();
        // return $users;
        $totalUser = count($users);
        return view('auth.userlist',compact('users','totalUser'));
    }

    public function create(){
        return view('auth.register');
    }
}
