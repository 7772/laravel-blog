<?php
/**
 * Created by PhpStorm.
 * User: landon
 * Date: 2019-07-09
 * Time: 13:57
 */

namespace Tests\Services;


use App\Http\Services\PostService;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Controllers\Blog\TestCaseForBlogWithAuth;
use Tests\MockHelper;

class PostServiceGetListTest extends TestCaseForBlogWithAuth
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
        $expectedPost = MockHelper::mockPost();

        // When
        $result = $this->service->getList();

        // Then
        $items = $result->items();
        $posts = collect($items)->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'created_at' => $post->created_at,
            ];
        });
        /** @var Post $firstPost */
        $firstPost = $posts[0];

        $this->assertNotNull($result);
        $this->assertEquals($firstPost['id'], $expectedPost->id);
        $this->assertEquals($firstPost['title'], $expectedPost->title);
        $this->assertEquals($firstPost['content'], $expectedPost->content);
    }

}