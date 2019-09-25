<?php

namespace Tests\Feature;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class clientTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function client_car_insert()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response= $this->post('/user/createcar',[
            'car_name'=>'BMW',
            'car_model'=>'123',
            'car_description'=>'new model car',
            'price'=>'2500',
            'capacity'=>'5',
            'fuel_type'=>'Disel',
            'aircondition'=>'yes',
            'image'=>'testimg',
            'billbook'=>'image1',
            'citizenship'=>'image2',
            'user_id' => $user->id,
        ]);
        $response->assertOk();
        $this->assertCount(1,Car::all());

    }
    public function client_cart_update()
    {
        $this->withoutExceptionHandling();
    
        $car = Car::first();
        $response= $this->patch('/user/updatecar/'.$car->id,[
            'car_name'=>'Ferrari',
            'car_model'=>'456',
            'car_description'=>'farrari car',
            'price'=>'5000',
            'capacity'=>'4',
            'fuel_type'=>'petrol',
            'aircondition'=>'yes',
            'image'=>'testimg123',
            'billbook'=>'doc1',
            'citizenship'=>'doc2',
            'user_id' => $user->id,
        ]);
        $this->assertEquals('Ferrari',Car::first()->car_name);
        $this->assertEquals('456',Car::first()->car_model);
        $this->assertEquals('farrari car',Car::first()->car_description);
        $this->assertEquals('5000',Car::first()->price);
        $this->assertEquals('4',Car::first()->capacity);
        $this->assertEquals('petrol',Car::first()->fuel_type);
        $this->assertEquals('yes',Car::first()->aircondition);
        $this->assertEquals('testimg123',Car::first()->image);
        $this->assertEquals('doc1',Car::first()->billbook);
        $this->assertEquals('doc2',Car::first()->citizenship);
        $this->assertEquals($user->id,Car::first()->user_id);

    }
    }
}
