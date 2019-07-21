<?php

namespace App\Http\Controllers\Blog\Ajax;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function me()
    {
        /** @var User $user */
        $user = Auth::user();

        return response()->json([
            'me' => [
                'email' => $user->email,
                'name' => $user->name,
            ],
        ]);
    }
}
