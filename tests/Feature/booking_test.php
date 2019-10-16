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

    public function booking_car_update()
    {
        $this->withoutExceptionHandling();
    
        $book = Booking::first();
        
        $response= $this->patch('/client/updatebooking/'.$car->id,[
            'Destination'=>'butwal',
            'current_location'=>'bhaktpur',
            'days'=>'4',
            'user_id' => $user->id,
        ]);
        $this->assertEquals('butwal',Booking::first()->Destination);
        $this->assertEquals('bhaktpur',Booking::first()->current_location);
        $this->assertEquals('4',Booking::first()->days);
        $this->assertEquals($user->id,Booking::first()->user_id);


    }
}
