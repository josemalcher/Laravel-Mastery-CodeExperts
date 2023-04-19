<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <x-slot name="header">Conteudos Cadastrados</x-slot>
    @foreach($contents as $content)
{{--        @livewire('content.content', ['content'=> $content], key($content->id))--}}
        <livewire:content.content :content="$content" :key="$content->id"></livewire:content.content>

    @endforeach

    {{$contents->links()}}

</div>
