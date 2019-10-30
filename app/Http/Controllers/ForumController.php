<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use App\Notifications\UserFeedback;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use \App\User;

class ForumController extends Controller
{
    
      public function forum(){


         $comments = \App\Forum::orderBy('created_at','DESC')->paginate(10);
        return view('user/forum',compact('comments'));
    }
     public function admin_forum(){

        $comments_count = \App\Forum::all();
        $comments = \App\Forum::orderBy('created_at','DESC')->paginate(10);
        return view('admin/forum',compact('comments','comments_count'));
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

        $admin = User::select('id')->where('email','admin@admin.com')->first();
        User::find($admin->id)->notify(new UserFeedback());

        return redirect('user/forum')->with('msg','Thanks for your feedback');
    }

public function deletemessage(Request $r)
{
    $id = $r->get('id');
    $forum = \App\Forum::find($id);
 
    $forum->delete();    
    return redirect('/user/forum')->with('msg','Comment deleted');
 
}
 public function editmessage($id){
            $forum = \App\Forum::find($id);

        return view('/user/updatemessage',compact('forum'));
    }

      public function updatemessage(Request $r)
    {
         $validations = array(
            'comment' => 'required'
        );
        $r->validate($validations);
        
            $id = $r->get('id');

            $forum = \App\Forum::find($id);
        

        $forum->comment = $r->get('comment');
        
        $forum->save();

        return redirect('/user/forum')->with('msg','Comment Updated');

    }


    
}
