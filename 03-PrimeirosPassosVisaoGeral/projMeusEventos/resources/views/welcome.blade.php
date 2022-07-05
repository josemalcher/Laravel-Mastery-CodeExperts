<h2>Eventos</h2>
<hr>
<ul>
@forelse($events as $event)
    <li>{{$event->title}}</li>
@empty
    <h3>Nenhum evento encontrado neste site....</h3>
@endforelse
</ul>

<hr>
@if(count($events))
<ul>
    @foreach($events as $event)
        <li>{{$event->title}}</li>
    @endforeach
@else
    <h3>Nenhum evento cadastrado</h3>
@endif
</ul>
