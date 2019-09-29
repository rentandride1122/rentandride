<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Car;
use App\User;
use Hash;

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


    /** @test */
    public function admin_can_change_password()
    {

        $this->withoutExceptionHandling();
      
        $oldPassword ='password';
        $newPassword = 'newPassword';
        $user = \factory(\App\User::class)->create(['password'=> Hash::make($oldPassword)]);

        $this->actingAs($user);

        $user = User::first();
        $response=$this->PUT('/changepassword/'.$user->id,[
            'password'=>'newPassword'
        ]);
        $this->assertEquals('newPassword',User::first()->password);




        $response = $this->Call('PUT','/changepassword',array(
            '_token'=>csrf_token(),
            'password'=>$oldPassword,
            'user_type'=>'admin',
            'newPassword'=>$newPassword,
            'repeat_new_password'=> $newPassword,
        ));
    

            $this->assertTrue(Hash::check($newPassword,$user->password));
    }
 /** @test */
    //update user 
    public function test_user_update()
    {
         $this->withoutExceptionHandling();
      
        $user = \factory(\App\User::class)->create();

        $user = User::first();
        $response= $this->put('/user/updateuser/'.$user->id,[
            'name'=>'Nishan Khadka',
            'address'=>'Lalitpur',
            'phone'=>'9855253595',

        ]);
        $this->assertEquals('Nishan Khadka',User::first()->name);
        $this->assertEquals('Lalitpur',User::first()->address);
        $this->assertEquals('9855253595',User::first()->phone);


      

    }

   //delete user 
     /** @test */
     public function test_user_delete()
    {
        $this->withoutExceptionHandling();
      

        $user = User::first();
        $this -> assertCount(1,User::all());


        $response = $this->delete('/user/deleteuser/'.$user->id);
        $this -> assertCount(0,User::all());


    }
        /** @test */
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
            'remarks'=> 'pending',
            'user_id' => $user->id,
        ]);
        // $response->assertOk();
        $this->assertCount(1,Car::all());

    }
}
