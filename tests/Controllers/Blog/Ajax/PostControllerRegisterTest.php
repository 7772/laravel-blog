<?php
/**
 * Created by PhpStorm.
 * User: landon
 * Date: 2019-07-07
 * Time: 18:55
 */

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
        $response = $this->json('POST', '/posts/register', $params);

        // Then
        $response->assertStatus(302);
    }
}