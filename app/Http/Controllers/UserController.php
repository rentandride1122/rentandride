<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Auth;


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


    public function updateuser(Request $r)
    {
        //testing
        // $data = request()->validate([
        //     'name'=>'required',
        //     'address'=>'required',
        //     'phone'=>'required',
        //     ]);
        // $user->update($data);

        $id = Auth::user()->id;
        $user = User::find($id);

        $user->name = $r->get('name');
        $user->phone = $r->get('phone');
        $user->address = $r->get('address');
        $user->save();

        return redirect('user/index')->with('msg','Updated Successfully');

//     public function updateuser(User $user)
//     {
//         //testing
//         $data = request()->validate([
//             'name'=>'required',
//             'address'=>'required',
//             'phone'=>'required',
//             ]);
//         $user->update($data);

// }


//   public function deleteuser(User $user){
//         $user->delete();
//     }

//        public function update(){
//         return view('user/user_update');
//     }




}



  public function deleteuser(){
        $id = Auth::user()->id;
        $user = \App\User::find($id);
        $user->delete();
        auth()->logout();
        return redirect('/user/index');
    }

       public function update(){

        $id = Auth::user()->id;
        $user = \App\User::find($id);
        return view('user/user_update',compact('user'));
    }

    public function logout(){

        auth()->logout();
        session()->flash('msg','logged out');
        return redirect('/user/index');
    }



}


  
