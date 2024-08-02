<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
class ResourcesAdminController extends Controller
{
    private const VIEW_BASE_PATH = 'admin/resources';
    private const BASE_URL = '/admin/resources';
    public function list(): mixed
    {
        $data = Resource::all();

        return view(self::VIEW_BASE_PATH . '/list', [
            'data' => $data,
        ]);
    }

    public function store(Request $request): mixed
    {
        if (false === $request->isMethod('post')) {
            return view(self::VIEW_BASE_PATH . '/add');
        }

        $exists = Resource::where('name', $request->input('name'))->first();

        if (null !== $exists) {
            $request->session()->flash('error', 'Tipo de recurso já existe');

            return view(self::VIEW_BASE_PATH . 'add');
        }

        $object = new Resource();
        $object->name = $request->input('name');
        $object->description = $request->input('description');

        $object->save();

        $request->session()->flash('success', 'Novo tipo de recurso inserido');

        return redirect(self::BASE_URL);
    
    }
}
