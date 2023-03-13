@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <form action="{{ route('admin.events.photos.store', $event) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Enviar Fotos do Evento</label>
                    <input type="file" class="form-control" multiple name="photos[]">
                </div>
                <button class="btn btn-success">Enviar fotos do Evento</button>
            </form>
            <hr>
            @dump($event->photos)
        </div>
    </div>
@endsection
