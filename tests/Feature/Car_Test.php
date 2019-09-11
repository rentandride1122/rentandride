<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Car;

class Car_Test extends TestCase
{
   // use RefreshDatabase;
   /** @test */
    public function admin_can_insert_car()
    {
        $this->withoutExceptionHandling();
        $response= $this->post('/admin/createcar',[
            'car_name'=>'BMW',
            'car_model'=>'123',
            'car_description'=>'new model car',
            'price'=>'2500',
            'capacity'=>'5',
            'fuel_type'=>'Disel',
            'aircondition'=>'yes',
            'image'=>'testimg',
        ]);
        $response->assertOk();
        $this->assertCount(1,Car::all());

    }
     /** @test */


     // Update Car 
    public function admin_can_update_car()
    {
        $this->withoutExceptionHandling();
      

        $car = Car::first();
        $response= $this->patch('/admin/updatecar/'.$car->id,[
            'car_name'=>'Ferrari',
            'car_model'=>'456',
            'car_description'=>'farrari car',
            'price'=>'5000',
            'capacity'=>'4',
            'fuel_type'=>'petrol',
            'aircondition'=>'yes',
            'image'=>'testimg123',
        ]);
        $this->assertEquals('Ferrari',Car::first()->car_name);
        $this->assertEquals('456',Car::first()->car_model);
        $this->assertEquals('farrari car',Car::first()->car_description);
        $this->assertEquals('5000',Car::first()->price);
        $this->assertEquals('4',Car::first()->capacity);
        $this->assertEquals('petrol',Car::first()->fuel_type);
        $this->assertEquals('yes',Car::first()->aircondition);
        $this->assertEquals('testimg123',Car::first()->image);


    }

    // Delete Car

    /** @test */

    public function admin_can_delete_car()
    {
        $this->withoutExceptionHandling();
      

        $car = Car::first();
        $this -> assertCount(1,Car::all());


        $response = $this->delete('/admin/deletecar/'.$car->id);
        $this -> assertCount(0,Car::all());


    }

     /** @test */

    public function admin_can_view_car()
    {
        $this->withoutExceptionHandling();
        $this ->actingas(factory(Car::class)->create());

        $response = $this->get('/admin/viewcar');
        $response->assertOk();
    }
}
