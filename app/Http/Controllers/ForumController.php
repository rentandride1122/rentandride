<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class ForumController extends Controller
{
      public function forum(){
         $comments = \App\Forum::orderBy('created_at','DESC')->paginate(10);
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
    return redirect('/user/forum')->with('msg','Message deleted');
 
}
 public function editmessage($id){
            $forum = \App\Forum::find($id);

        return view('/user/updatemessage',compact('forum'));
    }

      public function updatemessage(Request $r)
    {
            $id = $r->get('id');

            $forum = \App\Forum::find($id);
        

        $forum->comment = $r->get('comment');
        
        $forum->save();

        return redirect('/user/forum')->with('msg','Updated successfully');

    }


    
}
