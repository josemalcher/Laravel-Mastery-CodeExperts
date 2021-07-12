@extends('layout.app')

@section('title')
    Criar Evento
@endsection

@section('content')
    <div class="row">
        <div class="col-12 my-5">
            <h2>Criar Evento</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/admin/events/store" method="post">
                <div class="form-group">
                    <label for="">Título do Evento</label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="form-group">
                    <label for="">Descrição do Evento</label>
                    <input type="text" class="form-control" name="description">
                </div>

                <div class="form-group">
                    <label for="">Fale Mais SObre</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Data do Evento</label>
                    <input type="text" name="start_event" class="form-control">
                </div>
                <button type="submit" class="btn btn-lg btn-success">Criar Evento</button>
            </form>
        </div>
    </div>
@endsection
