<?php

namespace App\Http\Controllers\Blog\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Ajax\LoginRequest;
use App\Http\Services\AuthService;

class AuthController extends Controller
{
    /** @var AuthService */
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        $auth = $this->authService->login($request);
        return response()->json([
            'auth' => $auth,
        ]);
    }

    public function logout()
    {
        $this->authService->logout();
        return response()->json([
            'message' => 'Logout Success.',
        ]);
    }
}