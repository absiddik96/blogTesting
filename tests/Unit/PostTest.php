<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * @group formatted-date
     * @return [type]   [description]
     */
    public function testCanGetCreatedAtFormattedDate()
    {
        // Arrangement
        $post = Post::create([
            'title' => 'this is title',
            'body' => 'this is body',
        ]);
        // action
        $formattedDate = $post->createdAt();
        // assert
        $this->assertEquals($post->created_at->toFormattedDateString(),$formattedDate);
    }
}
