<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

    <x-slot name="header">Conteudos Cadastrados</x-slot>

    @if(session()->has('success'))
        <div class="w-full px-2 py-4 border border-green-500 bg-green-400 text-white rounded">
            {{session('success')}}
        </div>
    @endif

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{-- @livewire('content.content', ['content' => $content], key($content->id)) --}}
        {{-- Laravel 7+<livewire:content.content :content="$content" :key="$content->id"></livewire:content.content> --}}


        {{--    <h3>Testando Responsive Tailwind: </h3>--}}
        {{--    <div class="w-1/4 h-1/4 bg-blue-300 text-white sm:bg-blue-900 md:bg-green-500--}}
        {{--                lg:bg-red-800 xl:bg-yellow-600 2xl:bg-black">--}}
        {{--        Conteúdo exemplo...--}}
        {{--    </div>--}}

        <x-slot name="header">Conteúdos Cadastrados</x-slot>

        <div class="w-full py-4 flex justify-end">
            <a href="{{route('content.create')}}" class="btn btn-success">Criar Conteúdo</a>
        </div>

        @if(session()->has('success'))
            <div class="w-full px-2 py-4 border border-green-500 bg-green-400 text-white rounded">
                {{session('success')}}
            </div>
        @endif

        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mb-10">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Criado em
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Ação
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                @foreach($contents as $content)
                    <livewire:content.content :content="$content" :key="$content->id"></livewire:content.content>
                @endforeach
                </tbody>
            </table>
        </div>

        {{$contents->links()}}
    </div>

{{--    @foreach($contents as $content)--}}
{{--     @livewire('content.content', ['content'=>$content], key($content->id))--}}
{{--        <livewire:content.content :content="$content" :key="$content->id"></livewire:content.content>--}}
{{--    @endforeach--}}

{{--    {{$contents->links()}}--}}

</div>
