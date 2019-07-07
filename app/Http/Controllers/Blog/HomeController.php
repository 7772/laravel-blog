<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('blog.index')->with('posts', $posts);
    }
}
