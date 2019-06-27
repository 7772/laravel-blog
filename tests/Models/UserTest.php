<?php
/**
 * Created by PhpStorm.
 * User: landon
 * Date: 2019-06-27
 * Time: 10:50
 */

namespace Tests\Models;


use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test()
    {
        // Given
        $user = User::create([
            'name' => 'Hyundo',
            'email' => 'test@blog.io',
            'password' => bcrypt('secret'),
        ]);

        // When & Then
        $this->assertNotNull($user);
    }
}