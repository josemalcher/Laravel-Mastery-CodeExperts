@extends('layout.app')

@section('title')
    Meus Eventos
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Evento</th>
                    <th>Criado em</th>
                </tr>
                </thead>
                <tbody>
                @forelse($events as $event)
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->title}}</td>
                        <td>{{$event->created_at->format('d/m/Y H:i')}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhum evento encontrado</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
