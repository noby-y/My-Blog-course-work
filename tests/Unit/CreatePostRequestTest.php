<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use App\Http\Requests\Admin\CreatePostRequest;
use Database\Seeders\CategorySeeder;

class CreatePostRequestTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Run the necessary seeders before each test
        $this->seed(CategorySeeder::class);
    }

    public function testPostCreationValidationPassesWithValidData()
    {
        $requestData = [
            'title' => 'Sample Title',
            'image' => null,
            'post' => 'Sample content for the post.',
            'category' => 1,
            'tags' => 'tag1,tag2,tag3',
        ];

        $validator = Validator::make($requestData, (new CreatePostRequest)->rules());

        $this->assertFalse($validator->fails()); // If validation passes, assert false (not fails)
    }

    public function testPostCreationValidationFailsWithInvalidData()
    {
        $requestData = [
            'title' => '',
            'image' => 'invalid_image',
            'post' => '',
            'category' => 'abc',
            'tags' => '',
        ];

        $validator = Validator::make($requestData, (new CreatePostRequest)->rules());

        $this->assertTrue($validator->fails()); // If validation fails, assert true (fails)
    }

    // ... your other test methods
}
