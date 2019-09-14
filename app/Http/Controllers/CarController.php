<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Car;

use File;
// Insert Car 



class CarController extends Controller
{
  

    public function insert(){
        return view('admin/addCar');
    }
    public function store(Request $r)
    {

            //Testing
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

//      Testing Code
//     // Update Car
    public function updatecar(Request $r)
    {

// $data = request()->validate([
// 			'car_name'=>'required',
//     		'car_model'=>'required',
//     		'car_description'=>'required',
//     		'price'=>'required',
//     		'capacity'=>'required',
//     		'fuel_type'=>'required',
//     		'aircondition'=>'required',
//     		'image'=>'required',	
// ]);
// 		$car->update($data);

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

    	
        $validations = array(
            'name' => 'required',
            'model' => 'required',
            'price' => 'required|integer',
            'capacity' => 'required|integer',
            'description' => 'required',
            'image' => 'mimes:jpeg,bmp,png,gif|max:800'
        );
            $r->validate($validations);
            $id = $r->get('id');
            $oldimage = $r->get('oldimage');

            $car = \App\Car::find($id);
            if($r->hasFile('image'))
            {
            $file = $r->file('image');
            $name = date('ymdhis').$file->getClientOriginalName();
            $path = public_path().'/uploads/';
            $file->move($path,$name);
            $car->image = $name;

            $image_path = public_path()."/uploads/".$oldimage;
            
            File::delete($image_path);

            }

        $car->car_name = $r->get('name');
        $car->car_model = $r->get('model');
        $car->price = $r->get('price');
        $car->car_description = $r->get('description');
        $car->capacity = $r->get('capacity');
        $car->fuel_type = $r->get('fuel_type');
        $car->aircondition = $r->get('ac');
        $car->save();

        return redirect('/admin/viewcar')->with('msg','Updated successfully');

    }

//     public function deletecar(Car $car){
//     	$car->delete();
//     }



public function deletecar(Request $r)
{
    $id = $r->get('id');
    $car = \App\Car::find($id);
    $image_path = public_path()."/uploads/".$car['image'];
        if(File::exists($image_path)) {
        File::delete($image_path);
        }

    $car->delete();    
    return redirect('/admin/viewcar')->with('msg','Car Detail deleted');
 
}


    public function editcar($id){
        $car = Car::find($id);
        return view('admin/editcar',compact('car'));
    }
    public function deletecar(Car $car){
    	$car->delete();
    }



 	public function viewcar()
 	{

        $cars = Car::orderBy('created_at','DESC')->paginate(5);

 		return view('admin.viewcar',compact('cars'));

        //Testing
        // return viewcar('admin/viewcar');

        $cars = Car::all();
 		return view('admin.viewcar',compact('cars'));

	   	
    }

    public function editcar($id)
    {
        $car = Car::find($id);
        // dd($car);

        return view('admin/editcar',compact('car'));

    }
       
}
