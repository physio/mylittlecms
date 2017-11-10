@extends('MyLittleCMS::layouts.default')

@section('content')
                <!-- Start Banner Area-->
                <div class="banner-area text-center contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="banner-content-wrapper">
                                    <div class="banner-content">
                                        <h2>{{ $article->title }}</h2>
                                        <div class="banner-breadcrumb">
                                            <ul>
                                                <li><a href="/">home </a> <i class="zmdi zmdi-chevron-right"></i></li>
                                                <li>News</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Banner Area-->
                <!--Start Register Area-->
                <div class="register-area text-center mt-80">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12">
                                <div class="register-form mt-80 mb-80">
                                    <h3>{{ $article->title }}</h3><br>
                                    <div class="row">
                                            <div class="col-md-7">
                                                {!! $article->content !!}
                                            </div>
                                            <div class="col-md-5">
                                                <img src="/{{ $article->image }}" class="" alt="news image" title="{{ $article->title }}">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Register Area -->
                @endsection

