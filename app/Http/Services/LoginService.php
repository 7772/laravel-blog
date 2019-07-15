<?php

namespace App\Http\Services;

use App\User;

class LoginService
{
    public function login($data)
    {
        $email = $data['email'];
        $password = $data['password'];

        /** @var User $user */
        $user = User::where('email', $email)->first();

        if (! isset($user)) {
            abort(422, 'User does not exist.');
        }

        if (! $user->validateForPassportPasswordGrant($password)) {
            abort(422, 'Password does not match.');
        }

        $personalAccessToken = $user->createToken('blog');

        return [
            'access_token' => $personalAccessToken->accessToken,
            'email' => $user->email,
            'name' => $user->name,
        ];
    }
}