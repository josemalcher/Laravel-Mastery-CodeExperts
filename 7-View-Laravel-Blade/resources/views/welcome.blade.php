@extends('layout.site')

@section('title')
Principais Eventos
@endsection

@section('content')
    <h2>Eventos</h2>
    <hr>
    <ul>
        @forelse($events as $event)
            <li>{{$event->title}}</li>
        @empty
            <li>Nenhum evento encotrado nesse site...</li>
        @endforelse
    </ul>
    <hr>
@endsection
