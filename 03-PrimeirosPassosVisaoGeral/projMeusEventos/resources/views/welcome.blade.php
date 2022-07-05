<h2>Eventos</h2>
<hr>
<ul>
    @foreach($events as $event)
        <li>{{$event->title}}</li>
    @endforeach
</ul>
