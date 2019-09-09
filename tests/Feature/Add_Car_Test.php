<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Car;

class Add_Car_Test extends TestCase
{
   use RefreshDatabase;
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
}
