@extends('MyLittleCMS::layouts.default')

@section('content')

            <h1 id="intro-title">{{ $title }}</h1>
                 <h2>{{ \Carbon\Carbon::parse($event->dateStart)->format('d M Y') }}</h2>
                    <h3 class="light">{{ $event->title }}</h3>
                    {!! $event->description !!}
                </div>
                <div class="large-4 columns">
                    <div class="cta-box bottom-line top-line">
                        <div class="cta-box-content full-width center">
                            <img src="/{{ $event->image }}">
                        </div>
                        @if (($event->registration != null) and ($event->dateStart > $now))
                        <div class="cta-box-button bottom">
                            <a href="{{ $event->registration }}" class="button"><i class="icon ion-paper-airplane"></i> Iscrizione all'incontro</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                  <div class="large-4 columns center">


                    <i class="icon ion-android-locate icon-shortcode" style="font-size: 80px; color: #C7BFBF;"></i>



                    <h3>Dove?</h3>

                    <div>{{ $event->address }}</div>

                </div>



                <div class="large-4 columns center">

                    <i class="icon ion-android-clock icon-shortcode" style="font-size: 80px; color: #C7BFBF;"></i>
                    <h3>Quando?</h3>
                    <div>
                      <div>

                        <time datetime="2017-07-21T13:30:00Z">{{ \Carbon\Carbon::parse($event->dateStart)->format(' d M Y H:i') }}</time>



                    </div>
                </div>

            </div>


            <div class="large-4 columns center">
                <i class="icon ion-android-contacts icon-shortcode" style="font-size: 80px; color: #C7BFBF;"></i>


                <h3>Relatori</h3>

                <div>
                    @forelse ($event->relators as $relator)
                    <div><a href="/relatori/details/{{ $relator->surname }}/{{ $relator->name }}" hreflang="it">{{ $relator->surname }} {{ $relator->name }}</a></div>
                    @empty
                    <div>Nessun Relatore</div>
                    @endforelse
                </div>

            </div>
       

@endsection
