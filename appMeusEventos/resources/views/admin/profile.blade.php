@extends('layouts.app')


@section('content')

    <div class="row mt-5">
        <div class="col-12">
            <form action="{{route('admin.profile.update')}}" method="post">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-12">
                        <h3>Dados de Acesso</h3>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nome Completo</label>
                    <input type="text" class="form-control @error('user.name') is-invalid @enderror" name="user[name]" value="{{ $user->name }}">
                    @error('user.name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>EMail</label>
                    <input type="text" class="form-control @error('user.email') is-invalid @enderror" name="user[email]" value="{{ $user->email }}">
                    @error('user.email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control @error('user.password') is-invalid @enderror" name="user[password]" placeholder="Atualizar senha">
                    @error('user.password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Confirmar Senha</label>
                    <input type="password" class="form-control" name="user[password_confirmation]" placeholder="Atualizar senha">
                </div>

                @if($user->profile)
                    <div class="row">
                        <div class="col-12">
                            <h3>Dados de Perfil</h3>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sobre</label>
                        <textarea name="profile[about]" cols="30" rows="10" class="form-control">{{ $user->profile->about }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Contato</label>
                        <input type="text" class="form-control" name="profile[phone]" value="{{ $user->profile->phone }}">
                    </div>

                    <div class="form-group">
                        <label></label>
                        <input type="text" class="form-control" name="" >
                    </div>
                @endif

                <button class="btn btn-success btn-lg">Salvar</button>

            </form>
        </div>
    </div>

@endsection
