<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Hash;

class change_password_test extends TestCase
{
    
   // /** @test */
   //  public function admin_can_change_password()
   //  {
   //      $oldPassword ='password';
   //      $newPassword = 'newPassword';
   //      $user = \factory(\App\User::class)->create(['password'=> \Hash::make($oldPassword)]);

   //      $this->actingAs($user);

   //      $response = $this->Call('PUT','/user/update-password',array(
   //          '_token'=>csrf_token(),
   //          'current_password'=>$oldPassword,
   //          'newPassword'=>$newPassword,
   //          'repeat_new_password'=> $newPassword,
   //      ));
   //      $response->assertStatus(302);
   //      $this->assertTrue(Hash:check($newPassword,$user->password));
   //  }
}
