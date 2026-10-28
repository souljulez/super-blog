<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_main_posts_page(){
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_fetch_posts() {
        \App\Models\Post::factory()->count(3)->create();
        $posts = app(\App\Models\Post::class)->latest()->take(3)->get();

        expect($posts)->toHaveCount(3);
    }
}
