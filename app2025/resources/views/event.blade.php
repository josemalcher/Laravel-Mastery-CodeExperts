@extends('layouts.site')

@section('title')
    Evento - {{$event->title}}
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Evento: {{$event->title}}</h1>
        </div>
    </div>

@endsection
