{{--<div class="my-2">--}}
{{--    <div class="flex">--}}
{{--        {{ $content->id }} - {{ $content->title }} ---}}
{{--        <a href="{{route('content.edit', $content)}}" class="px-2 py-1 mr-2 border border-blue-600 rounded">Editar</a>--}}

{{--        <livewire:content.delete :content="$content"></livewire:content.delete>--}}

{{--    </div>--}}
{{--</div>--}}
<tr>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $content->id }}</div>
    </td>

    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $content->title }}</div>
    </td>

    <td class="px-6 py-4 whitespace-nowrap">
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100">
            {{ $content->created_at->format('d/m/Y H:i') }}
        </span>
    </td>

    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex">
            <a href="{{route('content.edit', $content)}}"
            class="px-2 py-1 border border-blue-600 rounded mr-2"
            >
                Editar
            </a>
            <livewire:content.delete :content="$content"></livewire:content.delete>
        </div>
    </td>
</tr>
