@extends('_templates.base')

@section('content')
    <div class="card card-body">
        <div class="d-flex justify-content-between">
            <h1>Usuários</h1>
            <div>
                <a class="btn btn-outline-primary" href="/admin/usuarios/add">
                    Novo Usuário
                </a>
            </div>
        </div>
        <hr>
        <table class="table table-hover table-striped">
            <thead class="table-dark">
            <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Data cadastro</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
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
