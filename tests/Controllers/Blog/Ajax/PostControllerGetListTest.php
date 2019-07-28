<?php

namespace Tests\Controllers\Blog\Ajax;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\MockHelper;
use Tests\TestCase;

class PostControllerGetListTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        config(['app.url' => 'http://test-7772.blog.io']);
    }

    /**
     * 게시물 리스트를 가져올 수 있다.
     */
    public function test()
    {
        // Given
        $post = MockHelper::mockPost();

        // When
        $response = $this->get('/ajax/posts');

        // Then
        $response->assertStatus(200)
            ->assertJsonStructure([
                'posts',
            ]);
    }

}