@extends('layouts.app')

@section('title')
    Meus Eventos -
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Evento</th>
                    <th scope="col">Criando em</th>
                </tr>
                </thead>
                <tbody>
                @forelse($events as $event)
                <tr>
                    <th scope="row">{{$event->id}}</th>
                    <td>{{$event->title}}</td>
                    <td>{{$event->created_at->format('d/m/Y H:i:s')}}</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhum Evento Encontrado</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
