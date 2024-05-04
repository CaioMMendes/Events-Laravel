@extends('layouts.main')


@section('title', 'Dashboard')

@section('content')


    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Eventos</h1>

        <table class="table" id="dashboard-table">
            <thead>
                <tr>
                    <th scope="col"># </th>
                    <th scope="col">Nome </th>
                    <th scope="col">Participantes </th>
                    <th scope="col">Ações </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/events/{{ $event->id }}"></a>{{ $event->title }}</td>
                        <td>0</td>
                        <td><a href="#">Editar</a><a href="#">Deletar</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        @if (count($events) > 0)
        @else
            <p>Você ainda não possui eventos, <a href="/events/create">criar evento</a></p>
        @endif
    </div>




@endsection
