@extends('_templates.base')

@section('content')
    <div class="card card-body">
        <div class="d-flex justify-content-between">
            <h1>Salas</h1>
            <div>
                <a class="btn btn-outline-primary" href="/admin/rooms/add">
                    Nova Sala
                </a>
            </div>
        </div>
        <hr>
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>Tipo de Sala</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->roomType->name }}</td>
                        <td style="display: flex">
                            <a href="{{route('admin.rooms.edit', $item->id)}}" class="btn btn-sm btn-outline-warning" style="margin-right: 3px">
                                Editar
                            </a>
                            <form action="{{route('admin.rooms.delete', $item->id)}}"
                                  method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
