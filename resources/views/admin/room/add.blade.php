@extends('_templates/base')

@section('content')
<div class="card card-body">
    <h1>Nova Sala</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" placeholder="Digite aqui" name="name" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="room_type_id" class="form-label">Tipo de Sala</label>
            <select class="form-control" name="room_type_id" id="room_type_id" required>
                @foreach ($data as $roomType)
                    <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="image" id="image" placeholder="Digite aqui" accept="image/png, image/jpeg" multiple required/>
        </div>

        <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
            Pronto
        </button>
    </form>
</div>
@endsection
