<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Repository\ProfileRepository;
use Illuminate\Http\Request;

class ProfileAdminController extends Controller
{
    private const VIEW_BASE_PATH = 'admin/profile/';

    public function __construct(
        private ProfileRepository $profileRepository
    ) {
    }

    public function list(): mixed
    {
        $data = $this->profileRepository->findAll();

        return view(self::VIEW_BASE_PATH.'list', [
            'data' => $data,
        ]);
    }

    public function store(Request $request): mixed
    {
        if (false === $request->isMethod('post')) {
            return view(self::VIEW_BASE_PATH.'add');
        }

        $object = new Profile();
        $object->name = $request->input('name');
        $object->description = $request->input('description');

        $this->profileRepository->save($object);

        $request->session()->flash('success', 'Novo Perfil cadastrado');

        return redirect('/admin/profiles');
    }
}
