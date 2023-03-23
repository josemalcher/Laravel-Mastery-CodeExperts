<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <h1>Exemplo componente LiveWire</h1>
    <br>
    <h2>{{$title}}</h2>
    <input type="text" wire:model.debounce.500ms="title">
    <input type="text" wire:model.lazy="title">
    <input type="text" wire:model.defer="title">
</div>
