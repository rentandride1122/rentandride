<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
// Insert Car 
class CarController extends Controller
{

    public function insert(){
        return view('admin/addCar');
    }
    public function store()
    {
    	Car::create([
    		'car_name'=>request('car_name'),
    		'car_model'=>request('car_model'),
    		'car_description'=>request('car_description'),
    		'price'=>request('price'),
    		'capacity'=>request('capacity'),
    		'fuel_type'=>request('fuel_type'),
    		'aircondition'=>request('aircondition'),
    		'image'=>request('image'),

    	]);
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
 	public function viewcar()
 	{
 		return viewcar('admin/viewcar');
	   	
    }
       
}
