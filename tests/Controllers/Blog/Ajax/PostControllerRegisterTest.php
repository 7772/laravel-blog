<?php

namespace Tests\Controllers\Blog\Ajax;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Controllers\Blog\TestCaseForBlogWithAuth;

class PostControllerRegisterTest extends TestCaseForBlogWithAuth
{
    use RefreshDatabase;

    public function test()
    {
        // Given
        $params = [
            'title' => 'hello',
            'content' => 'asdfasdlfnsoa',
        ];

        // When
        $response = $this->json('POST', '/ajax/posts/register', $params);

        // Then
        $response->assertStatus(200);
    }
}