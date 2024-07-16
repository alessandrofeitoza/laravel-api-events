<?php

namespace App\Repository;

use Illuminate\Support\Facades\Auth;
use App\Models\AuthUser;

class AuthRepository
{
    public function attemptLogin(array $credentials)
    {
        if (Auth::guard('auth')->attempt($credentials)) {
            $user = Auth::guard('auth')->user();
            return $user->profile_id;
        }

        return null;
    }

    public function logout()
    {
        Auth::guard('auth')->logout();
    }
}
