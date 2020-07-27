<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReplyTest extends TestCase {

    use DatabaseMigrations;

    /** @test * */
    public function it_has_an_owner() {
        $reply = create('App\Reply');
        //assertInstanceOf is check if $reply->owner is instance of User
        $this->assertInstanceOf('App\User', $reply->owner);
    }
}