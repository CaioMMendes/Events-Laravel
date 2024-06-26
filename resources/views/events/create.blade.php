@extends('layouts.main')


@section('title', 'Crie um evento')

@section('content')


    <div class="col-md-6 offset-md-3" id="event-create-container">

        <h1>Crie o seu evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem do Evento:</label>
                <input type="file" id="image" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="title">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
            </div>

            <div class="form-group">
                <label for="private">O evento é privado?:</label>
                <select type="text" class="form-control" id="private" name="private" placeholder="Nome do evento">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea class="form-control" id="description" name="description" placeholder="O que vai acontecer no evento">
                </textarea>
            </div>
            <div class="form-group">
                <label for="description">Adicione os items da infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Bebida"> Bebida
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Comida"> Comida
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Criar Evento">



        </form>



    </div>


@endsection
