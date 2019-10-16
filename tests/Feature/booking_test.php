<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class booking_test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function a_client_can_book_a_car()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $car = factory(Car::class)->create();
        $this->actingAs($user);
        $this->actingAs($car);


        $response= $this->post('/client/bookcar',[
            'Destination'=>'pokhara',
            'current_location'=>'katmandu',
            'days'=>'5',
            'user_id' => $user->id,
            'car_id'=>$car->id,
        ]);
        $response->assertOk();
        $this->assertCount(1,Booking::all());

    }
}
