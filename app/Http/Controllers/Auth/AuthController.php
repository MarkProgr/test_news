<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $authService)
    {
        $this->middleware('auth:api')->except(['login', 'register']);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        return $this->authService->login($request->validated());
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        return $this->authService->register($request->validated());
    }

    public function logout(): JsonResponse
    {
        return $this->authService->logout();
    }

    public function refreshToken(): JsonResponse
    {
        return $this->authService->refreshToken();
    }
}
