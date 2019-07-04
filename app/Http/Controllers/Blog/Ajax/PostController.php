<?php

namespace App\Http\Controllers\Blog\Ajax;

use App\User;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.posts.show')->with('post', $post);
    }

    public function register(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        /** @var User $user */
        $user = Auth::user();

        $post = new Post([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'user_id' => $user->id,
        ]);
        $post->save();

        return redirect('/');
    }
}