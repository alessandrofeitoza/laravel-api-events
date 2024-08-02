<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventType;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class EventTypeAdminController extends Controller
{
    private const VIEW_BASE_PATH = 'admin/event-type/';

    public function list(): mixed
    {
        $data = EventType::all();

        return view(self::VIEW_BASE_PATH.'list', [
            'data' => $data,
        ]);
    }

    public function store(Request $request): mixed
    {
        if (false === $request->isMethod('post')) {
            return view(self::VIEW_BASE_PATH.'add');
        }

        $object = new EventType();
        $object->id = Uuid::uuid4()->toString();
        $object->name = $request->input('name');

        $object->save();

        $request->session()->flash('success', 'Novo tipo de evento adicionado');

        return redirect('/admin/tipos-evento');
    }
}
