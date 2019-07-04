<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function create()
    {
        return view('blog.posts.create');
    }
}