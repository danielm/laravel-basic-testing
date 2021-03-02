<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_users()
    {
        $user = User::factory()->create([
            'email' => 'jhon@doe.com'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'jhon@doe.com'
        ]);

        $user->delete();

        $this->assertDatabaseMissing('users', [
            'email' => 'jhon@doe.com'
        ]);
    }
}
