<?php

namespace Tests\Services;

use App\Http\Services\PostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\MockHelper;
use Tests\TestCase;

class PostServiceShowTest extends TestCase
{
    use RefreshDatabase;

    private $service;

    public function setUp()
    {
        parent::setUp();

        $this->service = new PostService();
    }

    public function test()
    {
        // Given
        $post = MockHelper::mockPost();

        // When
        $result = $this->service->show($post->id);

        // Then
        $this->assertNotNull($result);
        $this->assertEquals($post->id, $result['id']);
        $this->assertEquals($post->user_id, $result['user_id']);
        $this->assertEquals($post->title, $result['title']);
        $this->assertEquals($post->content, $result['content']);
    }
}