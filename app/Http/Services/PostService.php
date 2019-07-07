<?php
/**
 * Created by PhpStorm.
 * User: landon
 * Date: 2019-07-07
 * Time: 18:42
 */

namespace App\Http\Services;

use App\Models\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function register($data)
    {
        /** @var User $user */
        $user = Auth::user();

        $post = Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => $user->id,
        ]);

        return $post;
    }
}