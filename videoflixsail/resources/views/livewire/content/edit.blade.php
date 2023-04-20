<div  class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

    <x-slot name="header">Editar Conteúdo {{$content->id}}</x-slot>

    @if(session()->has('success'))
        <div class="w-full px-2 py-4 text-black bg-green-400 border border-green-500 rounded">
            {{session('success')}}
        </div>
    @endif
    <br>
    {{--    <h2>{{$title}}</h2>--}}
    <form action="" wire:submit.prevent="editContent">
        <div class="mb-5">
            <label class="block">Título</label>
            <input type="text" wire:model.defer="content.title">
            @error('content.title')
            <strong>{{$message}}</strong>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block">Conteúdo</label>
            <input type="text" wire:model.defer="content.body">
            @error('content.body')
            <strong>{{$message}}</strong>
            @enderror
        </div>

        <button class="px-5 py-2 border border-green-500 rounded">Editar  dados</button>
    </form>

</div>
