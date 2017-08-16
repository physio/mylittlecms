@extends('MyLittleCMS::layouts.default')

@section('content')

                            @foreach ($listMajor as $provider)  
                            <div class="large-4 columns">
                                <div class="uxb-team-wrapper">
                                    <div class="uxb-team-thumbnail image-element">
                                        <a href="/fornitori/{{ $provider->companyName }}" class="image-link black-white">
                                            <img src="/{{ $provider->logo }}" alt="" />
                                            <div class="image-hover-icon bg-set">
                                                <i class="icon ion-link"></i>
                                            </div>
                                            <div class="image-hover-border"></div>
                                        </a>
                                    </div>
                                    <h2 class="uxb-team-name"><a href="/fornitori/{{ $provider->companyName }}">{{ $provider->companyName }}</a></h2>
                                    <h3 class="uxb-team-position">{{ $provider->area }}</h3>
                                    <p>
                                        {{ str_limit(strip_tags($provider->cv), $limit = 240, $end = '...') }} 
                                    </p>
                               </div>
                            </div>
                            @endforeach




@stop