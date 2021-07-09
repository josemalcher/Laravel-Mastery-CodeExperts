<h2>Eventos</h2>
<hr>
<ul>
    @forelse($events as $event)
        <li>{{$event->title}}</li>
    @empty
        <li>Nenhum evento encotrado nesse site...</li>
    @endforelse
</ul>
<hr>
@if(count($events))
    <ul>
        @foreach($events as $event)
            <li>{{$event->title}}</li>
        @endforeach
    </ul>
@else
    <h3>Nenhum evento encotrado nesse site...</h3>
@endif
