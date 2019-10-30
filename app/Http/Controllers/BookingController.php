<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Booking;
use \App\PrivateCar;
use \App\Car;
use File;
use \App\User;
use App\Notifications\BookingNotification;
use App\Notifications\AdminBookingCancel;
use App\Notifications\AdminBookingApprove;
use App\Notifications\AdminDeleteUserCar;
use App\Notifications\AdminConfirmCar;
use App\Notifications\UserBookingUpdate;
use App\Notifications\UserBookingCancel;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;

class BookingController extends Controller
{
    public function insert($id){
        $book = Booking::where([['user_id', Auth::user()->id],['remarks','!=','canceled'],['remarks','!=','done']])->first();

        
        if($book){
            return redirect('user/viewcars')->with('msg','Sorry, You cannot book more than one car at a time');
        }



    	$car_id = $id;
    	return view('user.carbooking',compact('car_id'));
    }
    public function insertprivate($id){
        $book = Booking::where([['user_id', Auth::user()->id],['remarks','!=','canceled'],['remarks','!=','done']])->first();
        
        if($book){
            return redirect('user/viewprivatecars')->with('msg','Sorry, You cannot book more than one car at a time');
        }
        $privatecar_id = $id;
        return view('user.privatecarbooking',compact('privatecar_id'));
    }

     public function store(Request $r)
    {

         $validation = array(
            'booking_from'=>'required',
            'booking_to'=>'required'
            
            );

    $r->validate($validation);
        $a = Booking::select('booking_from')->where([['car_id',$r->get('car_id')],['remarks','!=','canceled'],['remarks','!=','done']])->first();
        $b = Booking::select('booking_to')->where([['car_id',$r->get('car_id')],['remarks','!=','canceled'],['remarks','!=','done']])->first();

        $private1 = Booking::select('booking_from')->where([['privatecar_id',$r->get('privatecar_id')],['remarks','!=','canceled'],['remarks','!=','done']])->first();
        $private2 = Booking::select('booking_to')->where([['privatecar_id',$r->get('privatecar_id')],['remarks','!=','canceled'],['remarks','!=','done']])->first();

        // dd($private1,$private2);
        if($a != null){
            if($r->get('booking_from') >= $a->booking_from && $r->get('booking_from') <= $b->booking_to){
               return redirect()->back()->with('msg','This dates are unavailable, Please choose another dates');
            }
            if($r->get('booking_to') >= $a->booking_from && $r->get('booking_to') <= $b->booking_to){
                return redirect()->back()->with('msg','This dates are unavailable, Please choose another dates');
            }
        }
        if($private1 != null){
            if($r->get('booking_from') >= $private1->booking_from && $r->get('booking_from') <= $private2->booking_to){
               return redirect()->back()->with('msg','This dates are unavailable, Please choose another dates');
            }
            if($r->get('booking_to') >= $private1->booking_from && $r->get('booking_to') <= $private2->booking_to){
                return redirect()->back()->with('msg','This dates are unavailable, Please choose another dates');
            }
        }
    
        $booking = new Booking;
        $booking->booking_from = $r->get('booking_from');
        $booking->booking_to = $r->get('booking_to');
        $booking->user_id = Auth::user()->id;
        $booking->car_id = $r->get('car_id');
        $booking->privatecar_id = $r->get('privatecar_id');
        $booking->remarks = 'pending';
        
        $booking->save();

        $admin = User::select('id')->where('email','admin@admin.com')->first();
        User::find($admin->id)->notify(new BookingNotification());

        return redirect('/user/index')->with('msg','Your request has been sent');

    }

    public function view(){
    	$booking = Booking::where([['user_id',Auth::user()->id],['remarks','!=','canceled'],['remarks','!=','done']])->orderBy('created_at','DESC')->paginate(6);
       

    	return view('user.mybooking',compact('booking'));
    }

    public function view_bookings(){
         $bookings_count = Booking::all();
    	$bookings = Booking::orderBy('created_at','DESC')->paginate(8);
    	
    	return view('admin/viewbookings',compact('bookings','bookings_count'));
    }

    public function update_user_booking($id){
        $booking = Booking::findorFail($id);
        return view('user/editbooking',compact('booking'));
    }
    public function edit_user_booking(Request $r){
         $validation = array(
            'booking_from'=>'required',
            'booking_to'=>'required'
            
            );

    $r->validate($validation);
        
        $a = Booking::select('booking_from')->where([['car_id',$r->get('car_id')],['remarks','!=','canceled'],['remarks','!=','done']])->first();
        $b = Booking::select('booking_to')->where([['car_id',$r->get('car_id')],['remarks','!=','canceled'],['remarks','!=','done']])->first();

        $private1 = Booking::select('booking_from')->where([['privatecar_id',$r->get('privatecar_id')],['remarks','!=','canceled'],['remarks','!=','done']])->first();
        $private2 = Booking::select('booking_to')->where([['privatecar_id',$r->get('privatecar_id')],['remarks','!=','canceled'],['remarks','!=','done']])->first();

        // dd($private1,$private2);
        if($a != null){
            if($r->get('booking_from') >= $a->booking_from && $r->get('booking_from') <= $b->booking_to){
               return redirect()->back()->with('msg','This dates are unavailable, Please choose another dates');
            }
            if($r->get('booking_to') >= $a->booking_from && $r->get('booking_to') <= $b->booking_to){
                return redirect()->back()->with('msg','This dates are unavailable, Please choose another dates');
            }
        }
        if($private1 != null){
            if($r->get('booking_from') >= $private1->booking_from && $r->get('booking_from') <= $private2->booking_to){
               return redirect()->back()->with('msg','This dates are unavailable, Please choose another dates');
            }
            if($r->get('booking_to') >= $private1->booking_from && $r->get('booking_to') <= $private2->booking_to){
                return redirect()->back()->with('msg','This dates are unavailable, Please choose another dates');
            }
        }

        $id = $r->get('id');
        $booking = Booking::find($id);
        $booking->booking_from = $r->get('booking_from');
        $booking->booking_to = $r->get('booking_to');
        
        $booking->remarks = 'pending';
        
        $booking->save();

        $admin = User::select('id')->where('email','admin@admin.com')->first();
        User::find($admin->id)->notify(new UserBookingUpdate());

        return redirect('/user/booking/detail')->with('msg','Your request has been sent');
    }

    public function confirm_booking(Request $r){
        $id = $r->get('id');
        $userid = $r->get('userid');

        $booking = Booking::find($id);
        $booking->remarks = 'approved';
        $booking->save();

        User::find($userid)->notify(new AdminBookingApprove());

        return redirect('/admin/booking/detail')->with('msg','Booking Approved');
    }
    public function cancel_booking(Request $r){
        $id = $r->get('id');

        $userid = $r->get('userid');
        
        $booking = Booking::find($id);
        $booking->remarks = 'canceled';
        $booking->save();

        User::find($userid)->notify(new AdminBookingCancel());

        return redirect('/admin/booking/detail')->with('msg','Booking Canceled');
    }


    public function confirm_privatecar(Request $r){
        $id = $r->get('id');
        $userid = $r->get('userid');
       
        $privatecar = PrivateCar::find($id);
        $privatecar->remarks = 'approved';
        $privatecar->save();


        User::find($userid)->notify(new AdminConfirmCar());

        return redirect('/admin/viewprivatecar')->with('msg','Car Approved');
    }

    public function user_cancel_booking(Request $r){
        $id = $r->get('id');
        $booking = Booking::find($id);
        $booking->remarks = 'canceled';
        $booking->save();

        $admin = User::select('id')->where('email','admin@admin.com')->first();
        User::find($admin->id)->notify(new UserBookingCancel());

        return redirect('/user/booking/detail')->with('msg','Your Booking has been Canceled');

    }

    public function delete_privatecar(Request $r)
{
    $id = $r->get('id');
    $userid = $r->get('userid');

    
    $booking = Booking::where('privatecar_id',$id)->delete();
    
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

    User::find($userid)->notify(new AdminDeleteUserCar()); 
    return redirect('/admin/viewprivatecar')->with('msg','Car deleted');
 
}

public function complete_booking(Request $r){
        $id = $r->get('id');
        $booking = Booking::find($id);
        $booking->remarks = 'done';
        $booking->save();

        return redirect('/admin/booking/detail')->with('msg','Booking Completed');
    }
}
