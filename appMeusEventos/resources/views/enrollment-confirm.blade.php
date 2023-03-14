@extends('layouts.site')

@section('title')
    Confirmação de Inscrição
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Confirmação de Inscrição</h2>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p>Evento: <strong>{{ $event->title }}</strong><br>
            Dia: {{ $event->start_event->format('d/m/Y H:i') }}
            </p>
            <p>
                <a href="{{ route('enrollment.proccess') }}" class="btn btn-primary">Confirmar Inscrição</a>
            </p>
        </div>
    </div>

    <div class="row col-12">

    </div>
@endsection
