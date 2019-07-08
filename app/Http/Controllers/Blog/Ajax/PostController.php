<?php

namespace App\Http\Controllers\Blog\Ajax;

use App\Http\Requests\Blog\Ajax\RegisterPostRequest;
use App\Http\Services\PostService;
use App\Models\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function getList()
    {
        $posts = Post::latest()->get();
        return response()->json([
            'posts' => $posts
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.posts.show')->with('post', $post);
    }

    public function register(RegisterPostRequest $request)
    {
        $this->postService->register($request->all());

        return redirect()->route('home');
    }
}