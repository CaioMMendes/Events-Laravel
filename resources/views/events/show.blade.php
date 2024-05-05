@extends('layouts.main')


@section('title', $event->title)

@section('content')


    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-fluid">

            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $event->title }}</h1>
                <p class="event-city"><ion-icon name="pin"></ion-icon>{{ $event->city }}</p>
                <p class="events-participants"><ion-icon name="people"></ion-icon>{{ count($event->users) }}
                    participante(s)
                </p>
                <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{ $eventOwner['name'] }}</p>

                @if (!$hasUserJoined)
                    <form method="POST" action="/events/join/{{ $event->id }}">
                        @csrf
                        <div class="nav-item">
                            <button class="btn btn-primary" href="/events/join/{{ $event->id }}" id="event-submit"
                                onclick="event.preventDefault();
                        this.closest('form').submit(); "
                                type="button">
                                {{ __('Confirmar Presença') }}
                            </button>
                        </div>
                    </form>
                @else
                    <div class="already-joined-msg">Você já está participando deste evento!</div>
                @endif

                <h3>O evento conta com:</h3>
                <ul id="items-list">
                    @foreach ($event->items as $item)
                        <li><ion-icon name='play'></ion-icon> <span>{{ $item }}</span></li>
                    @endforeach
                    @if (count($event->items) === 0)
                        <p>Nada</p>
                    @endif
                </ul>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o evento:</h3>
                @foreach ($eventOwner as $owner)
                    <p>{{ $owner }}</p>
                @endforeach
                <p class="event-description">{{ $event->description }}</p>
            </div>
        </div>
    </div>



@endsection
