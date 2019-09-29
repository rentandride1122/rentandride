<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\PrivateCar;
use \App\Car;
use File;

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

        $imgname = '';
        if ($r->hasfile('image')) {
            $file = $r->file('image');
            $imgname = date('ymdhis').$file->getClientOriginalName();
            $path = public_path().'/uploads/';

            $file->move($path,$imgname);
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
        $car->image = $imgname;
        $car->citizenship = $citizenship;
        $car->billbook = $billbook;
        $car->fuel_type = request('fuel_type');
        $car->aircondition = request('aircondition');
        $car->user_id = Auth::user()->id;
        $car->remarks = 'pending';
        $car->save();

        return redirect('/user/createcar')->with('msg','your car has been added');

    }

    public function viewcar(){
         $cars = Car::orderBy('created_at','DESC')->paginate(5);

        return view('user.viewcars',compact('cars'));
    }
}
