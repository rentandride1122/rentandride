<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function store()
    {
    	\App\Car::create([
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
}
