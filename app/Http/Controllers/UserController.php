<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function register(RegisterUserRequest $request): JsonResponse
    {
        $user = $this->service->register($request->validated());
 
        return response()->json(['user' => $user, 'message' => 'User registered successfully']);
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        $data = $this->service->login($request->email, $request->password);

        if (!$data) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json($data);
    }
}
