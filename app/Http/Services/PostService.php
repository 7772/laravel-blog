<?php

namespace App\Http\Services;

use App\Models\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function getList()
    {
        $posts = Post::latest('id')->paginate(5);
        return $posts;
    }

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

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return $post;
    }
}