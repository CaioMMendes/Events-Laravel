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
                        <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                        <td>0</td>
                        <td class="table-actions-buttons"><a href='/events/edit/{{ $event->id }}'
                                class="btn btn-info edit-btn"><ion-icon name='create'></ion-icon>
                                Editar</a>


                            <form method="POST" action="/events/{{ $event->id }}">

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"> <ion-icon
                                        name='trash'></ion-icon> Deletar</button>
                            </form>

                        </td>
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
