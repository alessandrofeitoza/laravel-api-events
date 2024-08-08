<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    private const VIEW_BASE_PATH = 'admin/user/';

    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function list(): mixed
    {
        $data = $this->userRepository->findAll();

        return view(self::VIEW_BASE_PATH.'list', [
            'users' => $data,
        ]);
    }

    public function store(Request $request): mixed
    {
        if (false === $request->isMethod('post')) {
            return view(self::VIEW_BASE_PATH.'add');
        }

        $object = new User();
        $object->name = $request->input('name');
        $object->email = $request->input('email');
        $object->password = $request->input('password');

        $this->userRepository->save($object);

        $request->session()->flash('success', 'Novo Usuário cadastrado');

        return redirect('/admin/usuarios');
    }
}
