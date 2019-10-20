<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class ForumController extends Controller
{
      public function forum(){
         $comments = \App\Forum::orderBy('created_at','DESC')->get();
        return view('user/forum',compact('comments'));
    }

    public function comment(Request $r){
        $validations = array(
            'comment' => 'required'
        );
        $r->validate($validations);
        $forum = new \App\Forum;
        $forum->comment = $r->get('comment');
        $forum->user_id = Auth::user()->id;
        $forum->save();

        return redirect('user/forum');
    }

public function deletemessage(Request $r)
{
    $id = $r->get('id');
    $forum = \App\Forum::find($id);
 
    $forum->delete();    
    return redirect('/user/forum')->with('msg','Car Detail deleted');
 
}
    public function updatecar(Request $r)
    {
        $validations = array(
            'name' => 'required'
           
        );
            $r->validate($validations);
            $id = $r->get('id');
           
            $forum = \App\Forum::find($id);
            

        $forum->message = $r->get('message');
        $forum->save();

        return redirect('user/forum')->with('msg','Updated successfully');

    }

    
}
