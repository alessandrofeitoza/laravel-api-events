<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeAdminController extends Controller
{
    private const VIEW_BASE_PATH = 'admin/room-type/';
    private const BASE_URL = '/admin/tipos-sala';

    public function list(): mixed
    {
        $data = RoomType::all();

        return view(self::VIEW_BASE_PATH.'/list', [
            'data' => $data,
        ]);
    }

    public function store(Request $request): mixed
    {
        if (false === $request->isMethod('post')) {
            return view(self::VIEW_BASE_PATH.'add');
        }

        $exists = RoomType::where('name', $request->input('name'))->first();

        if (null !== $exists) {
            $request->session()->flash('error', 'Tipo de sala já existe');

            return view(self::VIEW_BASE_PATH.'add');
        }

        $object = new RoomType();
        $object->name = $request->input('name');
        $object->description = $request->input('description');

        $object->save();

        $request->session()->flash('success', 'Novo tipo de sala inserido');

        return redirect(self::BASE_URL);
    }
}
