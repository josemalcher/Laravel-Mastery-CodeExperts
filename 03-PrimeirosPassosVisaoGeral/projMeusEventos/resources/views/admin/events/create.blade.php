@extends('layouts.app')

@section('title')
    Criar Evento -
@endsection

@section('content')
    <div class="row">
        <div class="col-12 my-5">
            <h2>Criar Evento</h2>
        </div>
    </div>

    {{--
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{$erro}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    --}}
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.events.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Título Evento</label>
                    <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title">
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            @foreach($errors->get('title') as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Descrição Rápida Evento</label>
                    <input type="text" class="form-control @if($errors->has('description')) is-invalid @endif" name="description">
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            @foreach($errors->get('description') as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Fale Mais sobre o Evento</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control @if($errors->has('body')) is-invalid @endif"></textarea>
                    @if($errors->has('body'))
                        <div class="invalid-feedback">
                            @foreach($errors->get('body') as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Fale Mais sobre o Evento</label>
                    <input type="text" class="form-control @if($errors->has('start_event')) is-invalid @endif" name="start_event">
                    @if($errors->has('start_event'))
                        <div class="invalid-feedback">
                            @foreach($errors->get('start_event') as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-lg btn-success">Criar Evento</button>
            </form>
        </div>
    </div>
@endsection
