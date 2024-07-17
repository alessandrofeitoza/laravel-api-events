<?php

namespace App\Http\Validators;

use Illuminate\Support\Facades\Validator;

class LoginValidator
{
    public static function validate(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }
}
