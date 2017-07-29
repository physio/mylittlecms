@extends('layouts.default')

@section('content')
            <hr class="line-style" />
            
            <div id="content-container">
                
                <hr id="dynamic-side-line" class="line-style" />
                
                <div id="inner-content-container" class="main-width">
                    
                    <!-- Page Intro -->
                    <div id="intro-wrapper">
                        <h1 id="intro-title">I Nostri Servizi</h1>
                    </div>
                    <!-- End id="intro-wrapper" -->
                    
                    <div id="content-wrapper" class="with-sidebar">
                        
                        <div class="row">
                            <div class="large-12 columns">
                                <h2>{{ $title }}</h2>
                                <div id="blog-list-wrapper">
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
                                   
                                </div>
                                <!-- End id="blog-list-wrapper" -->
                                                                
                            </div>
                        </div>
                        
                    </div>
                    <!-- End id="content-wrapper" -->
                    
                    <!-- Sidebar -->
                            @include('includes.sidebar')
                    <!-- End id="sidebar-wrapper" -->
                    
                </div>
                <!-- End id="inner-content-container" -->
                
            </div>
            <!-- End id="content-container" -->
            

@endsection
