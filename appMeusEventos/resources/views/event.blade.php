@extends('layouts.site')

@section('title')
    Evento: {{$event->title}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            Evento: {{$event->title}}
        </div>
    </div>
@endsection
