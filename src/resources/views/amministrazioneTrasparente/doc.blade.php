@extends('MyLittleCMS::layouts.default')

@section('content')

            <h1 {{ $doc->item->title }}</h1>


                                <h2>
                                    {{ $doc->title }}
                                </h2>




                                <p>
                                    Ultimo Aggiornamento: <strong>{{ \Carbon\Carbon::parse($doc->updated_at)->format('d/m/Y') }} alle ore {{ \Carbon\Carbon::parse($doc->updated_at)->format('H:i') }}</strong>
                                </p>

                                <div id="single-content-wrapper">
                                    {!! $doc->description !!}
                                </div>
    
                                @if ($doc->attachment != null)
                                <div id="single-content-wrapper">
                                    <a href="/{{ $doc->attachment }}" class="btn btn-success">Scarica</a>
                                </div>
                                @endif

                            </div>




                        


@endsection


@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

@endsection

@section('scripts')
<script src="/libs/bootstrap-treeview/bootstrap-treeview.min.js"></script>
<script type="text/javascript">
    function getTree() {
      data = {!! $list !!}
      return data;
  }

  $('#tree').treeview(
  {          
    levels: 1,
    data: getTree(),
    enableLinks: true
});



</script>

@endsection