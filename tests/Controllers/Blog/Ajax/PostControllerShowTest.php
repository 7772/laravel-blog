<?php
/**
 * Created by PhpStorm.
 * User: landon
 * Date: 2019-06-30
 * Time: 13:46
 */

namespace Tests\Controllers\Blog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\MockHelper;
use Tests\TestCase;

class PostControllerShowTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        config(['app.url' => 'http://test-7772.blog.io']);
    }

    public function test()
    {
        // Given
        $post = MockHelper::mockPost();

        // When
        $response = $this->get("/ajax/posts/{$post->id}");

        // Then
        $response->assertStatus(200);
    }
}