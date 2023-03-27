<div>
    <x-slot name="header">Criar novo Conteúdo</x-slot>
    @if(session()->has('success'))
        <div class="w-full px-2 py-4 border border-green-500 bg-green-400 text-white rounded">
            {{session('success')}}
        </div>
    @endif
    <h1>Exemplo componente LiveWire</h1>
    <br>
    <h2>{{$title}}</h2>

    <form action=""  wire:submit.prevent="saveContent" >
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

        <button class="border border-green-500 px-5 py-2 rounded" >Salvar dados</button>
    </form>
</div>
