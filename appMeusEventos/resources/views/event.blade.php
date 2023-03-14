@extends('layouts.site')

@section('title')
    Evento: {{$event->title}}
@endsection

@section('content')
    @if($event->banner)
        <div class="mb-5">
            <div class="col-12">
                <img src="{{ asset('storage/'.$event->banner) }}" alt="Banner evento {{ $event->title }}"
                     class="img-fluid">
            </div>
        </div>
    @endif
    <div class="row mb-5">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div>
                <h2> Evento: {{$event->title}}</h2>
                <p>Ocorrerá em: {{ $event->start_event->format('d/m/Y H:i') }}</p>
            </div>
            <div>
                <a href="{{ route('enrollment.start', $event->slug) }}" class="btn btn-success">Inscrever-se</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            {{ $event->body }}
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab"
                            data-toggle="tab" data-target="#home" type="button" role="tab"
                            aria-controls="home" aria-selected="true">Sobre
                    </button>
                </li>
                @if($event->photos->count())
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab"
                                data-toggle="tab" data-target="#profile" type="button" role="tab"
                                aria-controls="profile" aria-selected="false">Fotos
                        </button>
                    </li>
                @endif
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade pt-5 show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    {{ $event->body }}
                </div>
                @if($event->photos->count())
                    <div class="tab-pane fade pt-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            @foreach($event->photos as $photo)
                                <div class="col-3">
                                    <img src="{{$photo->photo}}" alt="Foto do Evento {{$event->title}}"
                                         class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
