@extends('MyLittleCMS::layouts.default')

@section('content')

			<h1 id="intro-title">Amministrazione Trasparente</h1>
		
					@foreach ($list as $row)
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="{{ $row['href'] }}">{{ $row['text'] }}</a>
						</div>
						<div class="body">
							<ul>
								@forelse ($row['nodes'] as $node)
								<li><a href="{{ $node['href'] }}">{{ $node['text'] }}</a></li>
								@empty
								<li><a href="{{ $row['href'] }}">{{ $row['text'] }}</a></li>
								@endforelse
							</ul>
						</div>

					</div>
					@endforeach



@stop

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

@endsection