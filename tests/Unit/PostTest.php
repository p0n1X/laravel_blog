<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_create()
    {

        $post = new Post();
        $post->title = "Title";
        $post->description = "Description";
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $posts = Post::all();
        $this->assertCount(1, $posts);
    }

    public function test_delete()
    {
        $posts = Post::all();
        $this->assertCount(0, $posts);

        $post = new Post();
        $post->title = "Title";
        $post->description = "Description";
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $posts = Post::all();
        $this->assertCount(1, $posts);

        $post->delete();
        $posts = Post::all();
        $this->assertCount(0, $posts);

    }

    public function test_get_api()
    {
        $response = $this->get('/api/post');
        $response->assertStatus(200);
    }

    public function test_post_api()
    {
        $response = $this->post('/api/post/',[
            'title' => "Title",
            'description' => "Description",
            'category_id' => 1,
            'user_id' => 1,
        ]);
        $response->assertStatus(200);
    }

    public function test_delete_api()
    {

        $this->post('/api/post/',[
            'title' => "Title",
            'description' => "Description",
            'category_id' => 1,
            'user_id' => 1,
        ]);

        $posts = Post::all();
        $this->assertCount(1, $posts);
        $response = $this->delete('/api/post/edit/1');
        $response->assertStatus(200);

        $posts = Post::all();
        $this->assertCount(0, $posts);
    }
}
