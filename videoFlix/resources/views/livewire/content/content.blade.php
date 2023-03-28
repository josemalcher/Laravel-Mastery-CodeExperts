<div class="my-2">
    <div class="flex">
        {{ $content->id }} - {{ $content->title }} -
        <a href="{{route('content.edit', $content)}}" class="px-2 py-1 mr-2 border border-blue-600 rounded">Editar</a>

        <livewire:content.delete :content="$content"></livewire:content.delete>

    </div>
</div>
