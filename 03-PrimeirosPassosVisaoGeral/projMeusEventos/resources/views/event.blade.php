@extends('layouts.site')

@section('title')
Evento - {{$event->title}}
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <h2>Evento: {{$event->title}}</h2>
            <p>Evento Ocorrerá: {{$event->start_event->format('d/m/Y H:i:s')}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#sobre" role="tab" aria-controls="home" aria-selected="true">Sobre</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#fotos" role="tab" aria-controls="profile" aria-selected="false">Fotos</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="sobre" role="tabpanel" aria-labelledby="home-tab">
                    {{$event->body}}
                </div>
                <div class="tab-pane fade" id="fotos" role="tabpanel" aria-labelledby="profile-tab">...</div>
            </div>
        </div>
    </div>

@endsection
