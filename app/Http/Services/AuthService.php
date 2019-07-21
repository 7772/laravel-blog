<?php

namespace App\Http\Services;

use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\ClientRepository;

class AuthService
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

        $name = (new ClientRepository())->personalAccessClient()->name;
        $personalAccessToken = $user->createToken($name);

        return [
            'access_token' => $personalAccessToken->accessToken,
            'email' => $user->email,
            'name' => $user->name,
        ];
    }

    public function logout()
    {
        $token = Auth::user()->tokens()->latest()->first();

        if (! empty($token)) {
            $token->revoke();
        }

        return true;
    }
}