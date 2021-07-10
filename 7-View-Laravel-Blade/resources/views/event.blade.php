@extends('layout.site')


@section('title') Evento: - {{$event->title}}@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <h2> Evento: {{$event->title}}</h2>
            <p>Evento ocorrerá em {{$event->start_event->format('d/m/Y H:i')}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab"
                       aria-controls="home" aria-selected="true">SOBRE</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab"
                       aria-controls="profile" aria-selected="false">Photos</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                    {{$event->body}}
                </div>
                <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">

                </div>
            </div>
        </div>
    </div>

@endsection
