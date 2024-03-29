<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\PrivateCar;
use \App\Car;
use \App\User;
use \App\Booking;
use File;
use App\Notifications\UserCarInsert;
use App\Notifications\UserCarDelete;
use App\Notifications\UserCarUpdate;

use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;

class UserCarController extends Controller
{
    public function insert(){
        return view('user/rent_car');
    }

    public function store(Request $r)
    {
        $validation = array(
            'car_name'=>'required',
            'car_model'=>'required',
            'price'=>'required|integer',
            'capacity'=>'required|integer',
            'car_description'=>'required',
            'image'=>'mimes:jpeg,bmp,png,gif,jfif|max:3500',
            'billbook'=>'mimes:jpeg,bmp,png,gif,jfif|max:3500',
            'citizenship'=>'mimes:jpeg,bmp,png,gif,jfif|max:3500'
            );

    	$r->validate($validation);

        $image = '';
        if ($r->hasfile('image')) {
            $file = $r->file('image');
            $image = date('ymdhis').$file->getClientOriginalName();
            $path = public_path().'/uploads/';

            $file->move($path,$image);
        }


        $citizenship = '';
        if ($r->hasfile('citizenship')) {
            $file = $r->file('citizenship');
            $citizenship = date('ymdhis').$file->getClientOriginalName();
            $path = public_path().'/uploads/';
            $file->move($path,$citizenship);
        }
        


        $billbook = '';
        if ($r->hasfile('billbook')) {
            $file = $r->file('billbook');
            $billbook = date('ymdhis').$file->getClientOriginalName();
            $path = public_path().'/uploads/';
            $file->move($path,$billbook);
        }

        $car = new PrivateCar;
        $car->car_name = request('car_name');
        $car->car_model = request('car_model');
        $car->price = request('price');
        $car->car_description = request('car_description');
        $car->capacity = request('capacity');
        $car->image = $image;
        $car->citizenship = $citizenship;
        $car->billbook = $billbook;
        $car->fuel_type = request('fuel_type');
        $car->aircondition = request('aircondition');
        $car->user_id = Auth::user()->id;
        $car->remarks = 'pending';
        $car->save();

        $admin = User::select('id')->where('email','admin@admin.com')->first();
        User::find($admin->id)->notify(new UserCarInsert());

        return redirect('/user/yourcar')->with('msg','your request has been sent');

    }

    public function viewcar(){
         $cars = Car::orderBy('created_at','DESC')->paginate(5);

        return view('user.viewcars',compact('cars'));
    }

    public function viewyourcar(){
         $cars = PrivateCar::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(5);

        return view('user.yourcar',compact('cars'));
    }

    public function yourcardesc($id){
        $car = PrivateCar::find($id);

        return view('user.yourfullcar',compact('car'));

    }
    public function updateyourcar($id){
        $car = PrivateCar::find($id);
        return view('user/edityourcar',compact('car'));
    }

    public function deleteyourcar(Request $r){
         $id = $r->get('id');
         
        $booking = Booking::where('privatecar_id',$id)->delete();

       
        // $booking->delete();
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

        $admin = User::select('id')->where('email','admin@admin.com')->first();
        User::find($admin->id)->notify(new UserCarDelete());

    return redirect('/user/yourcar')->with('msg','Car deleted');
    }

    public function edityourcar(Request $r){
        $validations = array(
            'car_name' => 'required',
            'car_model' => 'required',
            'price' => 'required|integer',
            'capacity' => 'required|integer',
            'car_description' => 'required',
            
        );
            $r->validate($validations);
            $id = $r->get('id');
           

            $car = \App\PrivateCar::find($id);
            
           

        $car->car_name = $r->get('car_name');
        $car->car_model = $r->get('car_model');
        $car->price = $r->get('price');
        $car->car_description = $r->get('car_description');
        $car->capacity = $r->get('capacity');
        $car->fuel_type = $r->get('fuel_type');
        $car->aircondition = $r->get('aircondition');
        $car->save();

        $admin = User::select('id')->where('email','admin@admin.com')->first();
        User::find($admin->id)->notify(new UserCarUpdate());

        return redirect('/user/yourcar')->with('msg','Changes made');
    }

    public function fullcar($id){
        $car = Car::find($id);

        return view('user.cardescription',compact('car'));

    }
    public function fullprivatecar($id){
        $car = PrivateCar::find($id);

        return view('user.privatecardescription',compact('car'));

    }

    public function date(){
        return view('user.date');
    }
}
