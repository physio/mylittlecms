@extends('MyLittleCMS::layouts.default')

@section('content')

                @foreach ($list as $member) 
                <div class="large-4 columns">
                    <div class="uxb-team-wrapper">
                        <div class="uxb-team-thumbnail image-element">
                            <a class="image-link black-white" href="/relatori/details/{{ $member->surname }}/{{ $member->name }}"><img src="/{{ $member->photo }}" alt="" /></a>
                        </div>
                        <h3 class="uxb-team-name"><a href="/relatori/details/{{ $member->surname }}/{{ $member->name }}">{{ $member->full_name }}</a></h3>
                        <p>
                            {{ str_limit(strip_tags($member->cv), $limit = 120, $end = '...') }} 
                       </p>
                   </div>
               </div>
               @endforeach




@stop