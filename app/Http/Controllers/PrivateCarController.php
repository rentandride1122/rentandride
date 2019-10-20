<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\PrivateCar;

class PrivateCarController extends Controller
{
  	public function viewcar()
    {

        $cars = PrivateCar::where('remarks','posted')->orderBy('created_at','DESC')->paginate(5);
        $car = PrivateCar::all();

        return view('user/viewprivatecar',compact('cars','car'));

        
    }
}
