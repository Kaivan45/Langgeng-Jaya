<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_success()
    {
        User::factory()->create([
            'password' => bcrypt('password')
        ]);

        $response = $this->post('/login', [
            'password' => 'password'
        ]);

        $response->assertRedirect('/dashboard');
    }

    public function test_login_failed()
    {
        User::factory()->create([
            'password' => bcrypt('password')
        ]);

        $response = $this->from('/')
            ->post('/login', [
                'password' => 'salah'
            ]);

        $response->assertSessionHasErrors('password');
    }
}