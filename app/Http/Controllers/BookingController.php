<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Booking;
use \App\Car;

class BookingController extends Controller
{
    public function insert($id){
    	$car_id = $id;
    	return view('user.carbooking',compact('car_id'));
    }

     public function store(Request $r)
    {

         // $validation = array(
         //    'name'=>'required',
         //    'model'=>'required',
         //    'price'=>'required|integer',
         //    'capacity'=>'required|integer',
         //    'description'=>'required',
         //    'image'=>'mimes:jpeg,bmp,png,gif|max:3500'
         //    );

    //$r->validate($validation);

    	
        $booking = new Booking;
        $booking->booking_from = $r->get('booking_from');
        $booking->booking_to = $r->get('booking_to');
        $booking->user_id = Auth::user()->id;
        $booking->car_id = $r->get('car_id');
        // $booking->privatecar_id = '9';
        $booking->remarks = 'pending';
        
        $booking->save();

        return redirect('/user/index')->with('msg','Car added successfully');

    }
    public function view(){
    	$booking = Booking::where('user_id',Auth::user()->id)->get();

    	return view('user/mybooking',compact('booking'));
    }

    public function view_bookings(){
    	$bookings = Booking::orderBy('created_at','DESC')->paginate(8);
    	
    	return view('admin/viewbookings',compact('bookings'));
    }
}