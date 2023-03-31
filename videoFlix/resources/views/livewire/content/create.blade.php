<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-10">
    <x-slot name="header">Criar novo Conteúdo</x-slot>
    @if(session()->has('success'))
        <div class="w-full px-2 py-4 border border-green-500 bg-green-400 text-white rounded mb-10">
            {{session('success')}}
        </div>
    @endif

    <form action=""  wire:submit.prevent="saveContent" >
        <div class="mb-5">
            <label class="block">Título</label>
            <input type="text" wire:model.defer="title"
                   class="w-full @error('title') border-red-700 @enderror"
            >
            @error('title')
                <strong class="block mt-4 text-red-700 font-boldn">{{$message}}</strong>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block">Conteúdo</label>
            <input type="text" wire:model.defer="body" class="w-full
             @error('body') border-red-700 @enderror
            ">
            @error('body')
            <strong class="block mt-4 text-red-700 font-boldn">{{$message}}</strong>
            @enderror
        </div>

        <button class="border border-green-500 px-5 py-2 rounded" >Salvar dados</button>
    </form>
</div>
