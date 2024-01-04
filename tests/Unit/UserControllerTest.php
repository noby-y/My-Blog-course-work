<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Seeders\UserSeeder;
use App\Models\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        echo "set up runs\n";
        // Run the UserSeeder to create the user
        $this->seed(UserSeeder::class);
    }

    public function testUserCanLoginWithValidCredentials()
    {
        $response = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'password',
        ]);
        $user = User::where('email', 'admin@admin.com')->first();
        
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);

    }

    public function testUserCannotLoginWithInvalidCredentials()
    {
        
        $response = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'wrong_password',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}
