<?php

namespace Tests\Services;

use App\Http\Services\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Controllers\Blog\TestCaseForBlogWithAuth;
use Tests\MockHelper;

class AuthServiceLoginTest extends TestCaseForBlogWithAuth
{
    use RefreshDatabase;

    /** @var AuthService */
    private $authService;

    public function setUp()
    {
        parent::setUp();

        $this->artisan('passport:install');

        $this->authService= new AuthService();
    }

    public function test()
    {
        // Given
        MockHelper::mockUser('landon', 'landon@blog.io', 'secret');

        $params = [
            'email' => 'landon@blog.io',
            'password' => 'secret',
        ];

        // When
        $result = $this->authService->login($params);

        // Then
        $this->assertNotNull($result);
        $this->assertEquals($params['email'], $result['email']);
    }

}