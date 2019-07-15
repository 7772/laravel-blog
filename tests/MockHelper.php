<?php
/**
 * Created by PhpStorm.
 * User: landon
 * Date: 2019-06-27
 * Time: 10:26
 */

namespace Tests;

use App\Models\Post;
use App\User;
use Illuminate\Support\Str;

class MockHelper
{
    public static function mockUser($name = null, $email = null, $password = null) : User
    {
        $user = self::mockUserModel($name, $email, $password);

        $user->save();

        return $user->refresh();
    }

    public static function mockPost() : Post
    {
        $post = self::mockPostModel();

        $post->save();

        return $post->refresh();
    }

    private static function mockUserModel($name = null, $email = null, $password = null) : User
    {
        if (empty($name)) {
            $name = Str::random(5);
        }

        if (empty($email)) {
            $email = Str::random(10) . '@blog.io';
        }

        if (empty($password)) {
            $password = Str::random(10);
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        return $user;
    }

    private static function mockPostModel($title = null, $content = null, $userId = null) : Post
    {
        if (empty($title)) {
            $title = Str::random(5);
        }

        if (empty($content)) {
            $content = Str::random(100);
        }

        if (empty($userId)) {
            $user = self::mockUser();
            $userId = $user->id;
        }

        $post = Post::create([
            'title' => $title,
            'content' => $content,
            'user_id' => $userId,
        ]);

        return $post;
    }
}