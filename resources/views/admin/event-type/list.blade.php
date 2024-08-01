@extends('_templates.base')

@section('content')
    <div class="card card-body">
        <div class="d-flex justify-content-between">
            <h1>Tipos de Evento</h1>
            <div>
                <a class="btn btn-outline-primary" href="/admin/tipos-evento/add">
                    Novo Tipo de Evento
                </a>
            </div>
        </div>
        <hr>
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-warning">Editar</button>
                            <button class="btn btn-sm btn-outline-danger">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
