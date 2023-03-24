<div>
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
        </div>

        <div class="mb-5">
            <label class="block">Conteúdo</label>
            <input type="text" wire:model.defer="content">
        </div>

        <button class="border border-green-500 px-5 py-2 rounded" >Enviar dados</button>
    </form>
</div>
