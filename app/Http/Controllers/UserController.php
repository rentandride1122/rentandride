<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function login(){
    	return view('user/login');
    }
    public function register(){
    	return view('user/register');
    }
    public function index(){
    	return view('admin/index');
    }

    public function user_index(){
    	return view('user/index');
    }
   
    public function changepassword(User $user)
    {
        $data = request()->validate([
            'password'=>'required',
            'user_type'=>'required',

    ]);
        $user->update($data);

}

    public function updateuser(User $user)
    {
        //testing
        $data = request()->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            ]);
        $user->update($data);

}


  public function deleteuser(User $user){
        $user->delete();
    }


}


  
