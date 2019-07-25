<?php

namespace Tests\Services;

use App\Http\Services\PostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Controllers\Blog\TestCaseForBlogWithAuth;

class PostServiceRegisterTest extends TestCaseForBlogWithAuth
{
    use RefreshDatabase;

    private $service;

    public function setUp()
    {
        parent::setUp();

        $this->service = new PostService();
    }

    /**
     * 게시물을 등록할 수 있다.
     */
    public function test()
    {
        // Given
        $params = [
            'title' => 'hello',
            'content' => "I'm Landon",
        ];

        // When
        $result = $this->service->register($params);

        // Then
        $this->assertNotNull($result);
    }
}