<ul>
    @foreach($posts as $post)
        <li>
            {{ $post->title  }} - @can('update', $post) <a href="{{ route('post.edit', $post) }}">Editar</a>@endcan
        </li>
    @endforeach
</ul>
