<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <x-slot name="header">Criar novo conteudos</x-slot>

    @if(session()->has('success'))
        <div class="w-full px-2 py-4 text-black bg-green-400 border border-green-500 rounded">
            {{session('success')}}
        </div>
    @endif
    <br>
    <h2>{{$title}}</h2>
    <form action="" wire:submit.prevent="saveContent" >
        <div class="mb-5">
            <label class="block">Título</label>
            <input type="text" wire:model.defer="title">
            @error('title')
            <strong>{{$message}}</strong>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block">Conteúdo</label>
            <input type="text" wire:model.defer="body">
            @error('body')
            <strong>{{$message}}</strong>
            @enderror
        </div>

        <button class="px-5 py-2 border border-green-500 rounded">Enviar dados</button>
    </form>
</div>
