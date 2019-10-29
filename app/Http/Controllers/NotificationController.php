<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
     public function notification(){

        // $comments = \App\Notification::orderBy('created_at','DESC')->paginate(10);
        
        return view('admin/notifications');
    }

    public function markAsRead(){
    	auth()->user()->unreadNotifications->markAsRead();
    	return redirect('admin/notification');
    }
    public function user_markAsRead(){
    	auth()->user()->unreadNotifications->markAsRead();
    	return redirect()->back();
    }
}
