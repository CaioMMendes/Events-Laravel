@extends('layouts.main')


@section('title', 'Editando ' . $event->title)

@section('content')


    <div class="col-md-6 offset-md-3" id="event-create-container">

        <h1>Editando {{ $event->title }}</h1>
        <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Imagem do Evento:</label>
                <input type="file" id="image" name="image" class="form-control-file">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento"
                    value='{{ $event->title }}'>
            </div>
            <div class="form-group">
                <label for="title">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date"
                    value="{{ date('Y-m-d', strtotime($event->date)) }}">
            </div>

            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento"
                    value='{{ $event->city }}'>
            </div>

            <div class="form-group">
                <label for="private">O evento é privado?:</label>
                <select type="text" class="form-control" id="private" name="private" placeholder="Nome do evento">
                    <option value="0">Não</option>
                    <option value="1" {{ $event->private == '1' ? 'selected="selected"' : '' }}>Sim</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea class="form-control" id="description" name="description" placeholder="O que vai acontecer no evento">{{ $event->description }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="description">Adicione os items da infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras"
                        {{ in_array('Cadeiras', $event->items) ? 'checked=true' : '' }}>
                    Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"
                        {{ in_array('Palco', $event->items) ? 'checked=true' : '' }}> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Bebida"
                        {{ in_array('Bebida', $event->items) ? 'checked=true' : '' }}> Bebida
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Comida"
                        {{ in_array('Comida', $event->items) ? 'checked=true' : '' }}> Comida
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Editar Evento">



        </form>



    </div>


@endsection
