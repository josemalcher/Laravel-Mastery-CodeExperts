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
                @if($event->photos->count())
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab"
                           aria-controls="profile" aria-selected="false">Photos</a>
                    </li>
                @endif
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active pt-5" id="about" role="tabpanel" aria-labelledby="about-tab">
                    {{$event->body}}
                </div>
                @if($event->photos->count())
                    <div class="tab-pane fade pt-5" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                        <div class="row">
                            @foreach($event->photos as $photo)
                                <div class="col-3">
                                    <img src="{{$photo->photo}}" alt="{{$photo->title}}" class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
