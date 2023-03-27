<div>

    <x-slot name="header">Conteudos Cadastrados</x-slot>

    @foreach($contents as $content)
    {{-- @livewire('content.content', ['content'=>$content], key($content->id)) --}}
        <livewire:content.content :content="$content" :key="$content->id"></livewire:content.content>
    @endforeach

    {{$contents->links()}}

</div>
