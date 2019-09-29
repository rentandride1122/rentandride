<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Car;
use \App\PrivateCar;

use File;
// Insert Car 



class CarController extends Controller
{
  

    public function insert(){
        return view('admin/addCar');
    }
    public function store(Request $r)
    {

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
        $validations = array(
            'name' => 'required',
            'model' => 'required',
            'price' => 'required|integer',
            'capacity' => 'required|integer',
            'description' => 'required',
            'image' => 'mimes:jpeg,bmp,png,gif|max:3500'
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



 	public function viewcar()
 	{

        $cars = Car::orderBy('created_at','DESC')->paginate(5);
        $car = Car::all();

 		return view('admin.viewcar',compact('cars','car'));

	   	
    }
    public function viewprivatecar()
    {

        $cars = PrivateCar::orderBy('created_at','DESC')->paginate(5);
        $car = PrivateCar::all();

        return view('admin.viewprivatecar',compact('cars','car'));

        
    }
     public function viewprivatecarById($id)
    {

        $car = PrivateCar::find($id);

        return view('admin.viewsingleprivatecar',compact('car'));

        
    }


       
}
