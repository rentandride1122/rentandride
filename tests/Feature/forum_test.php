<?php

namespace Tests\Feature;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class forum_test extends TestCase
{
    public function forum_insert()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response= $this->post('/user/foruminsert',[
            'email'=> 'test@gmail.com',
            'message'=> 'testing',
            'user_id' => $user->id,
        ]);
        $response->assertOk();
        $this->assertCount(1,Forum::all());

    }
}
