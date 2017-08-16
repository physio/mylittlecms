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

                    <div id="blog-list-wrapper">

                        <div class="blog-item single">
                            <div class="blog-info">

                                <h2 class="blog-title">
                                    {{ $activity->title }}
                                </h2>

                                <div id="single-content-wrapper">

                                    <blockquote class="left">
                                        <p>
                                            <img src="/{{ $activity->image }}" title="{{ $activity->title }}" alt="{{ $activity->slug }}">
                                        </p>
                                    </blockquote>
                                    {!! $activity->description !!}
                                </div>
                                <!-- End id="single-content-wrapper" -->

                            </div>

                            @if (count($team) > 0)
                            <p><br></p>
                            <h3>Referenti:</h3>
                            @endif
                            <!-- Author Box -->
                            @foreach ($team as $element)
                            <div id="author-box">
                                <div id="author-photo-wrapper">
                                    <img id="author-photo" src="/{{ $element->photo }}" alt="" width="100px" />
                                </div>
                                <div id="author-info">
                                    <h3><a href="/team/details/{{ $element->surname }}/{{ $element->name }}">{{ $element->surname }} {{ $element->name }}</a></h3>
                                    {!! strip_tags(str_limit($element->cv, $limit = 300, $end = '...')) !!}
                                    <ul id="author-social">
                                        <li>
                                            Telefono: <b>{{ $element->phone }}</b>
                                        </li>
                                        <li>email: <b>{{ $element->email }}</b>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            @endforeach



                        </div>
                        <!-- End class="blog-item single" -->

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
