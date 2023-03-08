@extends('layouts.app')

@section('title')
    Meus Eventos
@endsection

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center my-5">
            <h2>Meus Eventos</h2>
            <a href="{{route('admin.events.create')}}" class="btn btn-success">Criar Evento</a>
        </div>
        <div class="col-12">
            <table class="table table-rounded table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Evento</th>
                    <th>Criado em</th>
                    <th width="20%">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->created_at->format('d/m/Y H:i') }}</td>
                        <td class="d-flex justify-content-between">
                            <a href="{{route('admin.events.edit', $event->id)}}" class="btn btn-info">Editar</a>
                            <form action="{{ route('admin.events.destroy', ['event'=> $event->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhum evento Encontrado</td>
                    </tr>

                @endforelse
                </tbody>
            </table>
            {{$events->links()}}
        </div>
    </div>

@endsection
