<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function userprofile(){

   	if (Auth::check())
	{
	 $id = Auth::user()->id;
	 $user = User::find($id);
	 return view('users')->with(['user'=>$user]);
	}
   	// view ('users');

   }
}
