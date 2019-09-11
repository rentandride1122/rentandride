<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
