@extends('_templates/base')

@section('content')
<div class="card card-body">
    <h1>Novo Tipo de Sala</h1>
    <hr>

    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" placeholder="Digite aqui" name="name" class="form-control" id="name">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" placeholder="Digite aqui" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
            Pronto
        </button>
    </form>
</div>
@endsection
