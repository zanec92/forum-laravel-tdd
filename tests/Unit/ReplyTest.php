<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    function it_has_an_owner()
    {
        $reply = factory()->create();

        $this->assertInstanceOf('App\User', $reply->owner);
    }
}
