<?php
/**
 * Created by PhpStorm.
 * User: landon
 * Date: 2019-06-27
 * Time: 12:18
 */

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function show()
    {
        return view('blog.posts.show');
    }
}