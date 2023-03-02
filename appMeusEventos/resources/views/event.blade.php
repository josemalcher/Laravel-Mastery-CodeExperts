@extends('layouts.site')

@section('title')
    Evento: {{$event->title}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
           <h2> Evento: {{$event->title}}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            {{ $event->body }}
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab"
                            data-toggle="tab" data-target="#home" type="button" role="tab"
                            aria-controls="home" aria-selected="true">Sobre</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab"
                            data-toggle="tab" data-target="#profile" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">Fotos</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    {{ $event->body }}
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            </div>
        </div>
    </div>
@endsection
