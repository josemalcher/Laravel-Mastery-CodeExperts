@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <form action="{{ route('admin.events.photos.store', $event) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Enviar Fotos do Evento</label>
                    <input type="file"
                           class="form-control @error('photos.*') is-invalid @enderror"
                           multiple name="photos[]">
                    @error('photos.*')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-success">Enviar fotos do Evento</button>
            </form>
            <hr>
            {{--@dump($event->photos)--}}
        </div>
    </div>
    <div class="row">
        @forelse($event->photos as $photo)
        <div class="col-4 mb-4 text-center">
            <img src="{{ asset('storage/'.$photo->photo) }}" alt="Fotos do evento {{ $event->title }}" class="img-fluid">
            <form action="{{ route('admin.events.photos.destroy', [$event, $photo]) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-1">Deletar Foto</button>
            </form>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning">
                Nenhuma Fotos Postada
            </div>
        </div>
        @endforelse
    </div>
@endsection
