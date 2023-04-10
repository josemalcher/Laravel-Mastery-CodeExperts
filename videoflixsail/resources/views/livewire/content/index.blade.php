<div>
    @foreach($contents as $content)
        <div class="block">{{$content->title}}</div>
    @endforeach

    {{$contents->links()}}

</div>
