@extends('layouts.main')


@section('title', 'Crie um evento')

@section('content')


    <div class="col-md-6 offset-md-3" id="event-create-container">

        <h1>Crie o seu evento</h1>
        <form action="/events" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
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

            <input type="submit" class="btn btn-primary" value="Criar Evento">



        </form>



    </div>


@endsection
