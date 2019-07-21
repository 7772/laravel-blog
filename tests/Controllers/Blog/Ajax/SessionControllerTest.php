<?php

namespace Tests\Controllers\Blog\Ajax;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\Controllers\Blog\TestCaseForBlogWithAuth;

class SessionControllerTest extends TestCaseForBlogWithAuth
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        Passport ::actingAs(
            $this->user,
            ['*']
        );
    }

    public function test()
    {
        // When
        $response = $this->get('/ajax/me');

        // Then
        $response->assertStatus(200)
            ->assertJsonStructure([
                'me',
            ]);
    }
}