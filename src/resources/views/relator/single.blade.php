@extends('MyLittleCMS::layouts.default')

@section('content')

            <h1 id="intro-title" class="uxb-team-name">{{ $relator->full_name }}</h1>
            <h2 id="intro-body" class="uxb-team-position-single">
                {{$relator->role}}
            </h2>
            <p class="uxb-team-email-single">
                <a href="mailto:{{ $relator->email }}"><span>{{ $relator->email }}</span></a>
            </p>

                    <p>
                        {!! $relator->cv !!}
                    </p>
              

            @if (count($relator->events) > 0)
                <h3>Ultimi Convegni svolti:</h3>
            @endif
            <ul>
                @foreach ($relator->events as $event)
                <li><a href="/eventi/dettaglio/{{ $event->slug }}">{{ $event->title }}</a> (svolto il {{ \Carbon\Carbon::parse($event->dateStart)->format('d M Y') }})</li>

                @endforeach
            </ul>
      
@endsection
