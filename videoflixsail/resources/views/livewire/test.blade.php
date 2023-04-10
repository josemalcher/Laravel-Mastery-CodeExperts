<div>

    @if(session()->has('success'))
        <div class="w-full px-2 py-4 text-black bg-green-400 border border-green-500 rounded">
            {{session('success')}}
        </div>
    @endif

    <h1>Exemplo componente LiveWire</h1>
    <br>
    <h2>{{$title}}</h2>
    <form action="" wire:submit.prevent="saveContent" >
        <div class="mb-5">
            <label class="block">Título</label>
            <input type="text" wire:model.defer="title">
        </div>

        <div class="mb-5">
            <label class="block">Conteúdo</label>
            <input type="text" wire:model="content">
        </div>

        <button class="px-5 py-2 border border-green-500 rounded">Enviar dados</button>
    </form>
</div>
