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
    public function a_client_car_insert()
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
}
