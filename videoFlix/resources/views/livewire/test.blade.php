<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <h1>Exemplo componente LiveWire</h1>
    <br>
    <h2>{{$title}}</h2>

    <form action="" >
        <div class="mb-5">
            <label class="block">Título</label>
            <input type="text" wire:model.defer="title">
        </div>

        <div class="mb-5">
            <label class="block">Conteúdo</label>
            <input type="text" wire:model="content" wire:keydown.enter.prevent="saveContent">
        </div>

        <button class="border border-green-500 px-5 py-2 rounded" >Enviar dados</button>
    </form>
</div>
