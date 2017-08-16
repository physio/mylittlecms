@extends('MyLittleCMS::layouts.default')

@section('content')

                    <h2>{{ $title }}</h2>

                        @if (count($list) > 0)

                        @foreach ($list as $event) 
                        <div class="blog-item">
                            <div class="blog-thumbnail image-element">
                                <a href="/eventi/dettaglio/{{ $event->slug }}" class="image-link black-white">
                                    <img src="/{{ $event->image }}" alt="{{ $event->title}}"/>
                                    <div class="image-hover-icon bg-set">
                                        <i class="icon ion-link"></i>
                                    </div>
                                    <div class="image-hover-border"></div>
                                </a>
                            </div>
                            <div class="blog-info">
                                <div class="blog-title-excerpt">
                                    <h2 class="blog-title">
                                        <a href="/eventi/dettaglio/{{ $event->slug }}">{{ $event->title }}</a>
                                    </h2>
                                    <div class="excerpt">
                                        {!! strip_tags(str_limit($event->description, $limit = 250, $end = '...')) !!}
                                    </div>
                                </div>
                                <div class="blog-meta-wrapper">
                                    <ul class="blog-meta">
                                        <li class="meta-date">
                                            {{ \Carbon\Carbon::parse($event->dateStart)->format('d M Y') }}
                                        </li>
                                        <li class="meta-author">
                                            @if (count($event->relators) == 0)
                                            Nessun Relatore
                                            @elseif (count($event->relators) == 1)
                                                @foreach ($event->relators as $relator)
                                                {{ $relator->full_name }}
                                                @endforeach
                                            @else
                                            Più Relatori
                                            @endif
                                        </li>
                                        <li class="meta-comments">
                                        <a href="{{ $event->registration }}">Modulo Iscrizione</a>
                                        </li>
                                        <li class="readmore-link">
                                            <a href="/eventi/dettaglio/{{ $event->slug }}">Leggi Tutto</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @else 
                        <p> Nessun evento disponibile</p>
                        @endif


                        <!-- Pagination --> 
                        <div class="row no-margin-bottom">
                            <div class="large-12 columns pagination-centered">
                                {{ $list->appends(['class' => 'pagination'])->links() }}
                            </div>
                        </div>





@endsection
