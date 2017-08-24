@extends('MyLittleCMS::layouts.default')

@section('content')
                <!-- Start Banner Area-->
                <div class="banner-area text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="banner-content-wrapper">
                                    <div class="banner-content">
                                        <h2>I Nostri Corsi</h2>
                                        <div class="banner-breadcrumb">
                                            <ul>
                                                <li><a href="index.html">home </a> <i class="zmdi zmdi-chevron-right"></i></li>
                                                <li>{{ $title }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Banner Area-->

                <!--Start Category Area-->
                <div class="category-area text-center pt-80 two">
                    <div class="container">
                        <div class="row">

                            @foreach($list->chunk(3) as $items)
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                @foreach($items as $item)
                                     <div class="single-category mb-30">
                                    <div class="category-img">
                                        <img src="/{{ $item->image }}" alt="category">
                                        <div class="category-hover">
                                            <h3>{{ $item->title }}</h3>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="category-content pt-20 pb-20">
                                        <h6>{{ $item->fasciaEta }} </h6>
                                        <p>{{ str_limit(strip_tags($item->description), $limit = 100, $end = '...') }} </p>
                                        <div class="class-button">
                                            <a href="/attivita/{{ $item->slug }}" class="read-more btn"><span>dettagli</span></a>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- End of Category Area -->

@endsection
