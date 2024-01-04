<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if the post with the title 'Default Post' already exists
        $defaultPost = Post::where('title', 'Default Post')->first();

        // If 'Default Post' doesn't exist, create it
        if (!$defaultPost) {
            Post::create([
                'title' => 'Default Post',
                'post' => 'This is a default post for testing purposes.',
                'user_id' => 1, // Assuming the admin user (user_id = 1) is the author
                'category_id' => 1, // Assuming the 'Default' category has id = 1
            ]);
        }
    }
}
