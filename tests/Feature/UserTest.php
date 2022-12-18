<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertSee('Responsive');
        $response->assertStatus(200);
    }
    public function test_redirect_to_login_when_user_not_login()
    {
        $response = $this->get('/home');

        $response->assertRedirect('/login');
    }

    public function test_user_can_access_login_page()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_login_redirect_to_home_successfully()
    {
        User::factory()->create([
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $response = $this->post('/login', [
            'email' => 'test@gmail.com',
            'password' => '12345678'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }

    public function test_auth_user_can_access_home()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
    }

    public function test_unauth_user_cannot_access_home()
    {
        $response = $this->get('/home');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_user_has_name_attribute()
    {
        $user = User::factory()->create([
            'name' => 'Hareza',
            'email' => 'test$gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $this->assertEquals('Hareza', $user->name);
    }

    public function test_user_can_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->post('logout')
            ->assertRedirect('/');
    }
}
