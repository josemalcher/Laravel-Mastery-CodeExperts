@extends('layouts.app')

@section('title')
    Editando Evento
@endsection


@section('content')

<div class="row">
    <div class="col-12 my-5">
        <h2>Editar Evento</h2>
    </div>
</div>

    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.event.update', ['event'=> $event->id])}}" method="post">

                @csrf

                <div class="form-group">
                    <label for="">Titulo do Evento</label>
                    <input type="text"class="form-control" name="title" value="{{$event->title}}">
                </div>

                <div class="form-group">
                    <label for="">Descrição</label>
                    <input type="text"class="form-control" name="description" value="{{$event->description}}">
                </div>

                <div class="form-group">
                    <label for="">Mais detalhes sobre o Evento</label>
                    <textarea class="form-control" name="body" cols="30" rows="10">
                        {{$event->body}}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="">Data do Evento</label>
                    <input type="text"class="form-control" name="start" value="{{$event->start}}">
                </div>
                <div class="form-group">
                    <label for="">Final do Evento</label>
                    <input type="text"class="form-control" name="end" value="{{$event->end}}">
                </div>
                <button type="submit" class="btn btn-lg btn-success">Atualizar Evento</button>
            </form>
        </div>
    </div>

@endsection
