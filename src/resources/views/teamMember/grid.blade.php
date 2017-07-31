@extends('MyLittleCMS::layouts.default')

@section('content')

                @foreach ($listMajor as $member) 
                <div class="large-6 columns">
                    <div class="uxb-team-wrapper">
                        <div class="uxb-team-thumbnail image-element">
                        <a href="/team/details/{{ $member->surname }}/{{ $member->name }}" class="image-link black-white">
                                <img src="/{{ $member->photo }}" alt="" />
                                <div class="image-hover-icon bg-set">
                                    <i class="icon ion-link"></i>
                                </div>
                                <div class="image-hover-border"></div>
                            </a>
                        </div>
                        <h2 class="uxb-team-name"><a href="/team/details/{{ $member->surname }}/{{ $member->name }}">{{ $member->full_name }}</a></h2>
                        <h3 class="uxb-team-position">{{ $member->role }}</h3>
                        <p>
                            {{ str_limit(strip_tags($member->cv), $limit = 240, $end = '...') }} 
                        </p>
                    </div>
                </div>
                @endforeach



                @foreach ($listMinor as $member) 
                <div class="large-4 columns">
                    <div class="uxb-team-wrapper">
                        <div class="uxb-team-thumbnail image-element">
                            <a class="image-link black-white" href="/team/details/{{ $member->surname }}/{{ $member->name }}"><img src="/{{ $member->photo }}" alt="" /></a>
                        </div>
                        <h3 class="uxb-team-name"><a href="/team/details/{{ $member->surname }}/{{ $member->name }}">{{ $member->full_name }}</a></h3>
                        <h4 class="uxb-team-position">{{ $member->role }}</h4>
                        <p>
                            {{ str_limit(strip_tags($member->cv), $limit = 120, $end = '...') }} 
                       </p>
                   </div>
               </div>
               @endforeach




@stop