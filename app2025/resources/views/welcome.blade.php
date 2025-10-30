@extends('layouts.site')

@section('title')
{{--    Evento - {{$event->title}}--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
{{--            Evento: {{$event->title}}--}}
        </div>
    </div>

    <div class="row mb-4">
        @forelse($events as $event)
            <div class="col-4">
                <div class="card">
                    <img src="https://via.placeholder.com/640x480.png/00dd99?text=omnis" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$event->title}}</h5>
                        <strong>Acontece em: {{$event->start->format('d/m/Y H:i:s')}}</strong>
                        <p class="card-text">{{$event->description}}</p>
                        <a href="{{route('event.single', ['slug'=> $event->slug])}}" class="btn btn-info">Ver Evento</a>
                    </div>
                </div>
            </div>
            @if(( $loop->iteration % 3) == 0 ) </div> <div class="row mb-4"> @endif
        @empty
            <div class="col-12">
                <div class="alert alert-warning">Nenhum evento encontrado neste site....</div>
            </div>
        @endforelse
    </div>
@endsection
