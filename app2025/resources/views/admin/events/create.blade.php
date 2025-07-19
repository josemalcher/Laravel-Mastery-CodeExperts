@extends('layouts.app')

@section('title')
    Cadastar um novo Evento
@endsection


@section('content')

<div class="row">
    <div class="col-12">
        <h2>Criar Evento</h2>
    </div>
</div>

    <div class="row">
        <div class="col-12">
            <form action="">
                <div class="form-group">
                    <label for="">Titulo do Evento</label>
                    <input type="text"class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Descrição</label>
                    <input type="text"class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Mais detalhes sobre o Evento</label>
                    <input type="text"class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Data do Evento</label>
                    <input type="text"class="form-control">
                </div>
            </form>
        </div>
    </div>

@endsection
