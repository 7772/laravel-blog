<?php
/**
 * Created by PhpStorm.
 * User: landon
 * Date: 2019-07-07
 * Time: 19:29
 */

namespace Tests\Services;


use App\Http\Services\PostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Controllers\Blog\TestCaseForBlogWithAuth;

class PostServicesRegisterTest extends TestCaseForBlogWithAuth
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