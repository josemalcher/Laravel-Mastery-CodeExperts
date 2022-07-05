@extends('layouts.site')

@section('title')
    Principais Eventos
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <h2>Eventos</h2>
            <hr>
        </div>
    </div>
    <div class="row mb-4">
        @forelse($events as $event)
            <div class="col-4">
                <div class="card">
                    <img src="https://via.placeholder.com/640x280.png/009955?text=consequuntur" alt="">
                    <div class="card-body">
                        <h5> {{$event->title}}</h5>
                        <strong>Acontece em: {{$event->start_event->format('d/m/Y H:i:s')}}</strong>
                        <p class="card-text">{{$event->description}}</p>
                        <a href="/eventos/{{$event->slug}}" class="btn btn-default">Ver Evento</a>
                    </div>
                </div>
            </div>
            @if(($loop->iteration % 3) == 0) </div><div class="row mb-4"> @endif
        @empty
            <div class="col-12">
                <div class="alert alert-warning">Nenhum Evento Cadastrado</div>
            </div>
        @endforelse
    </div>

@endsection
