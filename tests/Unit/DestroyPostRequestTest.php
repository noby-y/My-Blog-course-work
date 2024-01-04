<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Database\Seeders\PostSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\UserSeeder;

class DestroyPostRequestTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Run the necessary seeders
        $this->seed(UserSeeder::class);
        $this->seed(CategorySeeder::class);
        $this->seed(PostSeeder::class);
    }

    public function testPostCanBeDeleted()
    {
        // Login as admin
        $response_login = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'password',
        ]);
        
        // Retrieve a post from the database
        $post = Post::first();

        // Ensure the post exists
        $this->assertDatabaseHas('posts', ['id' => $post->id]);

        // Call the destroy method
        $response = $this->delete(route('admin.posts.destroy', $post->id));

        // Ensure the response is a redirect
        $response->assertRedirect(route('admin.posts.index'));

        // Ensure the post is deleted from the database
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}
