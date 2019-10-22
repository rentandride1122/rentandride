<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Booking;
use \App\PrivateCar;
use \App\Car;
use File;

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

    public function update_user_booking($id){
        $booking = Booking::find($id);
        return view('user/editbooking',compact('booking'));
    }
    public function edit_user_booking(Request $r){
        $id = $r->get('id');
        $booking = Booking::find($id);
        $booking->booking_from = $r->get('booking_from');
        $booking->booking_to = $r->get('booking_to');
        
        $booking->remarks = 'pending';
        
        $booking->save();

        return redirect('/user/booking/detail')->with('msg','Successfully changed');
    }

    public function confirm_booking(Request $r){
        $id = $r->get('id');
        $booking = Booking::find($id);
        $booking->remarks = 'approved';
        $booking->save();

        return redirect('/admin/booking/detail')->with('msg','Booking Approved');
    }
    public function cancel_booking(Request $r){
        $id = $r->get('id');
        $booking = Booking::find($id);
        $booking->remarks = 'canceled';
        $booking->save();

        return redirect('/admin/booking/detail')->with('msg','Booking Canceled');
    }

    public function confirm_privatecar(Request $r){
        $id = $r->get('id');
        $privatecar = PrivateCar::find($id);
        $privatecar->remarks = 'approved';
        $privatecar->save();

        return redirect('/admin/viewprivatecar')->with('msg','CAr Approved');
    }

    public function delete_privatecar(Request $r)
{
    $id = $r->get('id');
    $car = \App\PrivateCar::find($id);
        $image_path = public_path()."/uploads/".$car['image'];
        if(File::exists($image_path)) {
        File::delete($image_path);
        }

        $billbook_path = public_path()."/uploads/".$car['billbook'];
        if(File::exists($billbook_path)) {
        File::delete($billbook_path);
        }
        $citizenship_path = public_path()."/uploads/".$car['citizenship'];
        if(File::exists($citizenship_path)) {
        File::delete($citizenship_path);
        }

    $car->delete();    
    return redirect('/admin/viewprivatecar')->with('msg','Car deleted');
 
}
}
