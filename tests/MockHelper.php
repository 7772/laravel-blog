<?php
/**
 * Created by PhpStorm.
 * User: landon
 * Date: 2019-06-27
 * Time: 10:26
 */

namespace Tests;

use App\User;
use Illuminate\Support\Str;

class MockHelper
{
    public static function mockUser() : User
    {
        $user = self::mockUserModel();

        $user->save();

        return $user->refresh();
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
}