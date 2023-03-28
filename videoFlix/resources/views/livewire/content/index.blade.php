<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

    <x-slot name="header">Conteudos Cadastrados</x-slot>


    <div class="w-full py-4 flex justify-end">
        <a class="py-3 px-3 bg-green-800 hover:bg-green-500 text-white font-bold rounded"
            href="{{route('content.create')}}">Criar Conteúdo</a>
    </div>


    @if(session()->has('success'))
        <div class="w-full px-2 py-4 border border-green-500 bg-green-400 text-white rounded">
            {{session('success')}}
        </div>
    @endif

    @foreach($contents as $content)
    {{-- @livewire('content.content', ['content'=>$content], key($content->id)) --}}
        <livewire:content.content :content="$content" :key="$content->id"></livewire:content.content>
    @endforeach

    {{$contents->links()}}

</div>
