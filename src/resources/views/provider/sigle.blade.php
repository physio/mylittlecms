@extends('MyLittleCMS::layouts.default')

@section('content')

                        <h1 id="intro-title" class="uxb-team-name">{{ $provider->companyName }}</h1>
                        <h2 id="intro-body" class="uxb-team-position-single">
                            {{ $provider->area }}
                        </h2>
                        <p class="uxb-team-email-single">
                            <a href="mailto:{{ $provider->email }}">{{ $provider->email }}</a>
                        </p>
                        <ul class="uxb-team-social">
                            <li>
                                <a href="{{ $provider->twitter }}"><img src="/images/social/team/Twitter.png" alt="Twitter" title="Twitter" /></a>
                            </li>
                            <li>
                                <a href="{{ $provider->facebook }}"><img src="/images/social/team/Facebook.png" alt="Facebook" title="Facebook" /></a>
                            </li>
                            <li>
                                <a href="{{ $provider->google }}"><img src="/images/social/team/Google.png" alt="Google+" title="Google+" /></a>
                            </li>
                        </ul>
                        

                                {!! $provider->description !!}



@endsection
