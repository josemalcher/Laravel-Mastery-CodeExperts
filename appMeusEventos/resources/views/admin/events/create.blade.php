@extends('layouts.app')

@section('title')
Criar Evento
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
        <form action="{{route('admin.events.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Título Evento</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Descrição Rápida Evento</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}">
                @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Fale Mais sobre</label>
                <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>
                @error('body')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Quando Ocorrerá</label>
                <input type="text" class="form-control @error('start_event') is-invalid @enderror" name="start_event" value="{{ old('start_event') }}">
                @error('start_event')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Carregar um Banner para o Evento</label>
                <input type="file" name="banner" id="banner" class="form-control">
            </div>

            <button type="submit" class="btn btn-lg btn-success">Criar Evento</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')
    <script>

        let el = document.querySelector('input[name=start_event]');
        console.log(el);
        let im = new Inputmask('99/99/9999 99:99');
        console.log(im);

        im.mask(el);

    </script>
@endsection
