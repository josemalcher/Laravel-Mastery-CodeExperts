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
                    <label>Título Evento</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$event->title}}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Descrição Rápida Evento</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$event->description}}">
                    @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Mais detalhes sobre o Evento</label>
                    <textarea class="form-control @error('body') is-invalid @enderror"   name="body" cols="30" rows="10">{{$event->body}}</textarea>
                    @error('body')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Data do Evento</label>
                    <input type="text"class="form-control @error('start') is-invalid @enderror"  value="{{$event->start}}"  name="start">
                    @error('start')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Final do Evento</label>
                    <input type="text"class="form-control @error('end') is-invalid @enderror" value="{{$event->end}}"  name="end">
                    @error('end')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-lg btn-success">Atualizar Evento</button>
            </form>
        </div>
    </div>

@endsection
