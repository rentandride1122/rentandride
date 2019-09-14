<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class change_password_test extends TestCase
{
    
   /** @test */
    public function user_can_change_password()
    {
      $this->withoutExceptionHandling();
        $user = User::first();
        $response= $this->patch('/changepassword/'.$user->id,[
        'password'=>'1111',
    ]);    
    $this->assertEquals('1111',User::first()->password);       
    }
}
