<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function register()
    {
        return view('blog.posts.register');
    }
}