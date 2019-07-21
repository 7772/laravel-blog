<?php

namespace Tests\Services;

use App\Http\Services\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\MockHelper;
use Tests\TestCase;

class AuthServiceLogoutTest extends TestCase
{
    use RefreshDatabase;

    /** @var AuthService */
    private $authService;

    public function setUp()
    {
        parent::setUp();

        config(['app.url' => 'http://test-7772.blog.io']);
        $this->artisan('passport:install');
        $this->authService = new AuthService();
    }

    public function test()
    {
        // Given
        $user = MockHelper::mockUser('landon', 'landon@blog.io', 'secret');
        $this->actingAs($user);

        $params = [
            'email' => 'landon@blog.io',
            'password' => 'secret',
        ];

        // When
        $this->authService->login($params);
        $result = $this->authService->logout();

        // Then
        $user->refresh();
        $this->assertEquals($result, true);
        $this->assertEquals($user->tokens()->latest()->first()->revoked, true);
    }
}