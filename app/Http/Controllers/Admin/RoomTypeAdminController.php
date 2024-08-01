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

        return view(self::VIEW_BASE_PATH . '/list', [
            'data' => $data,
        ]);
    }

    public function store(Request $request): mixed
    {
        if (true === $request->isMethod('post')) {
            $object = new RoomType();
            $object->name = $request->input('name');
            $object->description = $request->input('description');

            $object->save();

            return redirect(self::BASE_URL);
        }

        return view(self::VIEW_BASE_PATH . '/add');
    }
}
