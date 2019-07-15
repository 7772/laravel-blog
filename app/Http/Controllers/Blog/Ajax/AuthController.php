<?php

namespace App\Http\Controllers\Blog\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Ajax\LoginRequest;
use App\Http\Services\LoginService;

class AuthController extends Controller
{
    /** @var LoginService */
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(LoginRequest $request)
    {
        $auth = $this->loginService->login($request);
        return response()->json([
            'auth' => $auth,
        ]);
    }
}