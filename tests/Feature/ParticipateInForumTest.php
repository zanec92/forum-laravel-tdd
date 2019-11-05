<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function unauthenticated_users_may_not_add_replies()
    {
        $this->withExceptionHandling()
            ->post('/threads/some-channel/1/replies', [])
            ->assertRedirect('/login');
    }
    /** @test */
    function an_authenticated_user_may_participate_in_form_threads()
    {
        $this->be($user = create('App\User'));

        $thread = create('App\Thread');
        
        $reply = make('App\Reply');
        $this->post($thread->path().'/replies', $reply->toArray());
        
        $this->get($thread->path())
            ->assertSee($reply->body);
    }
}
