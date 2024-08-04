@extends('_templates/base')

@section('content')
<div class="card card-body">
    <h1>Editar Sala</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" placeholder="Digite aqui" value="{{$data->name}}" name="name" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="room_type_id" class="form-label">Tipo de Sala</label>
            <select class="form-control" name="room_type_id" id="room_type_id" required>
                @foreach ($roomTypes as $roomType)
                    <option value="{{ $roomType->id }}" @selected($data->room_type_id === $roomType->id)>{{ $roomType->name }}</option>
                @endforeach
            </select>
        </div>

        @if($data->image_url)
            <div class="card mb-3">
                <label for="name" class="form-label">Imagem Atual</label>
                <img class="card-img-top" src="{{ $data->image_url }}" alt="Imagem Atual">
                <div class="card-body">
                    <p class="card-text">
                        <label for="name" class="form-label">Nova Imagem</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Digite aqui" accept="image/png, image/jpeg" multiple/>
                    </p>
                </div>
            </div>
        @else
            <div class="mb-3">
                <label for="name" class="form-label">Imagem</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="Digite aqui" accept="image/png, image/jpeg" multiple required/>
            </div>
        @endif

        <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
            Pronto
        </button>
    </form>
</div>
@endsection
