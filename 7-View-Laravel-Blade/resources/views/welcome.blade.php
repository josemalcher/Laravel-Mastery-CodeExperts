@extends('layout.site')

@section('title')
    Principais Eventos
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Eventos</h2>
        </div>
    </div>

    <div class="row mb-4">
        @forelse($events as $event)
            <div class="col-4">
                <div class="card">
                    <img src="https://via.placeholder.com/640x480.png/0077cc?text=perspiciatis" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$event->title}}</h5>
                        <small>Acontece em {{$event->start_event->format('d/m/Y H:i')}}</small>
                        <p class="card-text">{{$event->description}}</p>
                        <a href="/eventos/{{$event->slug}}" class="btn btn-success">Ver Evento</a>
                    </div>
                </div>
            </div>
            @if(($loop->iteration % 3) == 0) </div> <div class="row mb-4"> @endif
        @empty
            <div class="col-12">
                <div class="alert alert-danger">
                    Nenhum evento encotrado nesse site...
                </div>
            </div>
        @endforelse
    </div>
@endsection

