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
     //    $validation = array(
     //        'car_name'=>'required',
     //        'car_model'=>'required',
     //        'price'=>'required|integer',
     //        'capacity'=>'required|integer',
     //        'car_description'=>'required',
     //        'image'=>'mimes:jpeg,bmp,png,gif,jfif|max:3500',
     //        'billbook'=>'mimes:jpeg,bmp,png,gif,jfif|max:3500',
     //        'citizenship'=>'mimes:jpeg,bmp,png,gif,jfif|max:3500'
     //        );

    	// $r->validate($validation);

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

        return redirect('/user/yourcar')->with('msg','your car has been added');

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
        $car = \App\PrivateCar::find($id);
        

    $car->delete();    
    return redirect('/user/yourcar')->with('msg','Car deleted');
    }

    public function edityourcar(Request $r){
        // $validations = array(
        //     'name' => 'required',
        //     'model' => 'required',
        //     'price' => 'required|integer',
        //     'capacity' => 'required|integer',
        //     'description' => 'required',
        //     'image' => 'mimes:jpeg,bmp,png,gif|max:3500'
        // );
        //     $r->validate($validations);
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
}
