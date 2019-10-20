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

    public function forum_update()
    {
        $forum = factory(Forum::class)->create();
        $this->actingAs($forum);

        $response= $this->post('/user/forumupdate',[
            'message'=> 're testing ',
        ]);
    
        $this->assertEquals('re testing',Forum::first()->message);
      


    }
    public function admin_can_view_forum()
    {
        $this->withoutExceptionHandling();
        $this ->actingas(factory(Forum::class)->create());

        $response = $this->get('/admin/viewforum');
        $response->assertOk();
    }

    public function admin_can_delete_forum()
    {
        $this->withoutExceptionHandling();
      

        $forum = Forum::first();
        $this -> assertCount(1,Forum::all());


        $response = $this->delete('/admin/deleteform/'.$forum->id);
        $this -> assertCount(0,Forum::all());


    }
}
