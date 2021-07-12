
@extends('layout.app')

@section('title')
    Editar Evento
@endsection

@section('content')
    <div class="row">
        <div class="col-12 my-5">
            <h2>Editar Evento</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/admin/events/update/{{$event->id}}" method="post">

                @csrf

                <div class="form-group">
                    <label for="">Título do Evento</label>
                    <input type="text" class="form-control" name="title" value="{{$event->title}}">
                </div>

                <div class="form-group">
                    <label for="">Descrição do Evento</label>
                    <input type="text" class="form-control" name="description" value="{{$event->description}}">
                </div>

                <div class="form-group">
                    <label for="">Fale Mais SObre</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$event->body}}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Data do Evento</label>
                    <input type="text" name="start_event" class="form-control" value="{{$event->start_event}}">
                </div>
                <button type="submit" class="btn btn-lg btn-success">Atualizar Evento</button>
            </form>
        </div>
    </div>
@endsection
