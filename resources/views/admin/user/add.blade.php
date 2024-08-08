@extends('_templates/base')

@section('content')
<div class="card card-body">
    <h1>Novo Usuário</h1>
    <hr>

    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" placeholder="Digite aqui" name="name" class="form-control" id="name">

            <label for="email" class="form-label">Email</label>
            <input type="email" placeholder="Digite aqui" name="email" class="form-control" id="email">

            <label for="password" class="form-label">Password</label>
            <input type="password" placeholder="Digite aqui" name="password" class="form-control" id="password">
        </div>

        <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
            Pronto
        </button>
    </form>
</div>
@endsection
