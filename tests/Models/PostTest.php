<?php
/**
 * Created by PhpStorm.
 * User: landon
 * Date: 2019-06-27
 * Time: 10:20
 */

namespace Tests\Models;


use App\Models\Post;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\MockHelper;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test()
    {
        // Given
        $title = '첫번째 포스트';
        $content = '안녕하세요........';
        /** @var User $user */
        $user = MockHelper::mockUser();

        $post = Post::create([
            'title' => $title,
            'content' => $content,
            'user_id' => $user->id,
        ]);

        // When & Then
        $this->assertNotNull($post);
    }
}