<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserAdminController extends Controller
{
    public function list (): mixed 
    {
        // TODO: refatorar para usar uma camada de repository
        $users = User::all();
    
        return view('user/list', [
            'users' => $users,
        ]);
    } 
}
