<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Car;
// Insert Car 
class CarController extends Controller
{

    public function insert(){
        return view('admin/addCar');
    }
    public function store(Request $r)
    {
    	// Car::create([
    	// 	'car_name'=>request('car_name'),
    	// 	'car_model'=>request('car_model'),
    	// 	'car_description'=>request('car_description'),
    	// 	'price'=>request('price'),
    	// 	'capacity'=>request('capacity'),
    	// 	'fuel_type'=>request('fuel_type'),
    	// 	'aircondition'=>request('aircondition'),
    	// 	'image'=>request('image'),

    	// ]);
         $validation = array(
            'name'=>'required',
            'model'=>'required',
            'price'=>'required|integer',
            'capacity'=>'required|integer',
            'description'=>'required',
            'image'=>'mimes:jpeg,bmp,png,gif|max:3500'
            );

    $r->validate($validation);

        $imgname = '';
        if ($r->hasfile('image')) {
            $file = $r->file('image');
            $imgname = date('ymdhis').$file->getClientOriginalName();
            $path = public_path().'/uploads/';
            $file->move($path,$imgname);
        }

        $car = new Car;
        $car->car_name = $r->get('name');
        $car->car_model = $r->get('model');
        $car->price = $r->get('price');
        $car->car_description = $r->get('description');
        $car->capacity = $r->get('capacity');
        $car->image = $imgname;
        $car->fuel_type = $r->get('fuel_type');
        $car->aircondition = $r->get('ac');
        $car->save();

        return redirect('/admin/createcar')->with('msg','Car added successfully');

    }


    // Update Car
    public function updatecar(Car $car)
    {
$data = request()->validate([
			'car_name'=>'required',
    		'car_model'=>'required',
    		'car_description'=>'required',
    		'price'=>'required',
    		'capacity'=>'required',
    		'fuel_type'=>'required',
    		'aircondition'=>'required',
    		'image'=>'required',	
]);
		$car->update($data);
    	
    }
    public function deletecar(Car $car){
    	$car->delete();
    }
}
