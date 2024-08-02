<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Space;
use App\Repository\SpaceRepository;
use Illuminate\Http\Request;

class SpaceAdminController extends Controller
{
    private const VIEW_BASE_PATH = 'admin/space/';

    public function __construct(
        private SpaceRepository $spaceRepository
    ) {
    }

    public function list(): mixed
    {
        $data = $this->spaceRepository->findAll();

        return view(self::VIEW_BASE_PATH.'list', [
            'data' => $data,
        ]);
    }

    public function store(Request $request): mixed
    {
        if (false === $request->isMethod('post')) {
            return view(self::VIEW_BASE_PATH.'add');
        }

        $object = new Space();
        $object->name = $request->input('name');
        $object->description = $request->input('description');
        $object->address = $request->input('address');

        $this->spaceRepository->save($object);

        $request->session()->flash('success', 'Novo Espaço cadastrado');

        return redirect('/admin/spaces');
    }
}
