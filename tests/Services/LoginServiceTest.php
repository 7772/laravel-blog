<?php

namespace Tests\Services;

use App\Http\Services\LoginService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Controllers\Blog\TestCaseForBlogWithAuth;
use Tests\MockHelper;

class LoginServiceTest extends TestCaseForBlogWithAuth
{
    use RefreshDatabase;

    /** @var LoginService */
    private $loginService;

    public function setUp()
    {
        parent::setUp();

        $this->artisan('passport:install');

        $this->loginService = new LoginService();
    }

    public function test()
    {
        // Given
        $user = MockHelper::mockUser('landon', 'landon@blog.io', 'secret');
        $user->save();

        $params = [
            'email' => 'landon@blog.io',
            'password' => 'secret',
        ];

        // When
        $result = $this->loginService->login($params);

        // Then
        $this->assertNotNull($result);
        $this->assertEquals($params['email'], $result->email);
        $this->assertTrue($result->validateForPassportPasswordGrant($params['password']));
        $this->assertNotNull($result->tokens()->latest()->first());
    }

}