@extends('MyLittleCMS::layouts.default')

@section('content')

{{ $article->title }}

<img src="/{{ $article->image }}" title="{{ $article->title }}" alt="{{ $article->slug }}">

{!! $article->content !!}



@endsection
