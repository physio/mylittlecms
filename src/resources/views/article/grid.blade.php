@extends('MyLittleCMS::layouts.default')

@section('content')
<hr class="line-style" />

<div id="content-container">

    <hr id="dynamic-side-line" class="line-style" />

    <div id="inner-content-container" class="main-width">

        <!-- Page Intro -->
        <div id="intro-wrapper">
            <h1 id="intro-title">{{ $title }}</h1>
        </div>
        <!-- End id="intro-wrapper" -->

        <div id="content-wrapper" class="with-sidebar">

            <div class="row">
                <div class="large-12 columns">
                    <h2>{{ $title }}</h2>
                    <div id="blog-list-wrapper">
                        @if (count($list) > 0)

                        @foreach ($list as $event) 
                        <div class="blog-item">
                            <div class="blog-thumbnail image-element">
                                <a href="/news/{{ $event->slug }}" class="image-link black-white">
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
                                        <a href="/news/{{ $event->slug }}">{{ $event->title }}</a>
                                    </h2>
                                    <div class="excerpt">
                                        <p>
                                        {!! strip_tags(str_limit($event->content, $limit = 250, $end = '...')) !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="blog-meta-wrapper">
                                    <ul class="blog-meta">
                                        <li class="meta-date">
                                            {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                                        </li>
                                        <li class="meta-author">
                                        
                                            @if (count($event->user) == 0)
                                            Autore Sconosciuto
                                            @else
                                            {{ $event->user->name }}
                                            @endif
                                        </li>

                                        <li class="readmore-link">
                                            <a href="/news/{{ $event->slug }}">Leggi Tutto</a>
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


                    </div>
                    <!-- End id="blog-list-wrapper" -->

                </div>
            </div>

        </div>
        <!-- End id="content-wrapper" -->

        <!-- Sidebar -->
   
        <!-- End id="sidebar-wrapper" -->

    </div>
    <!-- End id="inner-content-container" -->

</div>
<!-- End id="content-container" -->


@endsection
