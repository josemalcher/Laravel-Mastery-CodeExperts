@extends('layouts.app')

@section('title')
    Meus Eventos -
@endsection

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>Meus Eventos</h2>
            <a href="{{route('admin.event.create')}}" class="btn btn-success">Criar evento</a>
        </div>
        <div class="col-12">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Evento</th>
                    <th>Criado em</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($events as $event)
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->title}}</td>
                        <td>{{$event->created_at->format('d/m/Y H:i:s')}}</td>
                        <td>
                            <a href="{{ route('admin.event.edit', ['event'=> $event->id]) }}" class="btn btn-info">Editar</a>
                            <a href="{{ route('admin.event.destroy', ['event'=> $event->id]) }}" class="btn btn-danger">Remover</a>
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
