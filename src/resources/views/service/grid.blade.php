@extends('MyLittleCMS::layouts.default')

@section('content')

                                <h2>{{ $title }}</h2>

                                    @foreach ($list as $activity) 
                                    <div class="blog-item">
                                        <div class="blog-thumbnail image-element">
                                            <a href="/servizi/dettaglio/{{ $activity->slug }}" class="image-link black-white">
                                                <img src="/{{ $activity->image }}" alt="" />
                                                <div class="image-hover-icon bg-set">
                                                    <i class="icon ion-link"></i>
                                                </div>
                                                <div class="image-hover-border"></div>
                                            </a>
                                        </div>
                                        <div class="blog-info">
                                            <div class="blog-title-excerpt">
                                                <h2 class="blog-title">
                                                    <a href="/servizi/dettaglio/{{ $activity->slug }}">{{ $activity->title }}</a>
                                                </h2>
                                                <div class="excerpt">
                                                   {!! strip_tags(str_limit($activity->description, $limit = 250, $end = '...')) !!}
                                                </div>
                                            </div>
                                            <div class="blog-meta-wrapper">
                                                <ul class="blog-meta">
                                                    <li class="readmore-link">
                                                        <a href="/servizi/dettaglio/{{ $activity->slug }}">Leggi Tutto</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                   

            

@endsection
