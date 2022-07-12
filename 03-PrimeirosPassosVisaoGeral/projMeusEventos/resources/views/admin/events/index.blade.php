@extends('layouts.app')

@section('title')
    Meus Eventos -
@endsection

@section('content')
    <div class="row">

        <div class="col-12 d-flex justify-content-between align-items-center my-5">
            <h2>Meus Eventos</h2>
            <a href="/admin/events/create" class="btn btn-success">Criar Evento</a>
        </div>

        <div class="col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Evento</th>
                    <th scope="col">Criando em</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($events as $event)
                <tr>
                    <th scope="row">{{$event->id}}</th>
                    <td>{{$event->title}}</td>
                    <td>{{$event->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <a href="/admin/events/{{$event->id}}/edit" class="btn btn-info">Editar</a>
                        <a href="/admin/events/destroy/{{$event->id}}" class="btn btn-danger">Remover</a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhum Evento Encontrado</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{$events->links()}}
        </div>
    </div>
@endsection
