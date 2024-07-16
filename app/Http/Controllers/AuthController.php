<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Validators\LoginValidator;
use App\Repository\AuthRepository;

class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(Request $request)
    {
        $validator = LoginValidator::validate($request->all());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $credentials = $request->only('email', 'password');
        $profileId = $this->authRepository->attemptLogin($credentials);

        if ($profileId !== null) {
            return response()->json(['profile_id' => $profileId], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout()
    {
        $this->authRepository->logout();
        return response()->json(['message' => 'Logged out successfully']);
    }
}
