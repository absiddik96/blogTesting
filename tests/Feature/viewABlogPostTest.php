<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class viewABlogPostTest extends TestCase
{
    public function testCanViewABlogPost()
    {
        // Arrangement
        // create a blog post
        $post = Post::create([
            'title' => 'this is title',
            'body' => 'this is body',
        ]);
        // Action
        // visiting a route
        $resp = $this->get("/posts/{$post->id}");
        // Assert
        // Assert status
        $resp->assertStatus(200);
        // Assert see
        $resp->assertSee($post->title);
        $resp->assertSee($post->body);
        $resp->assertSee($post->created_at->toFormattedDateString());
    }

    /**
     * @group post-not-found
     * @return [type] [description]
     */
    public function testViewA404PageWhenPostIsNotFound()
    {
        // Action
        $resp = $this->get('/posts/INVALID_ID');
        // Assert
        $resp->assertStatus(404);
        $resp->assertSee('The page you are looking for could not be found');
    }
}
