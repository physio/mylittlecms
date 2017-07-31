@extends('MyLittleCMS::layouts.default')

@section('content')

            <h1>{{ $arg->title }}</h1>

                                <h2>
                                    {{ $arg->title }}
                                </h2>




                                <p>
                                    Ultimo Aggiornamento: <strong>{{ \Carbon\Carbon::parse($arg->updated_at)->format('d/m/Y') }} alle ore {{ \Carbon\Carbon::parse($arg->updated_at)->format('H:i') }}</strong>
                                </p>


                                    @if ($arg->image != null)
                                    <blockquote class="left">
                                        <p>
                                            <img src="/{{ $arg->image }}" title="{{ $arg->title }}" alt="{{ $arg->slug }}">
                                        </p>
                                    </blockquote>
                                    @endif
                                    {!! $arg->description !!}


                                @if ( count($subArgs) > 0)
                                <ul>
                                    @foreach ($subArgs as $sub)
                                    <li class="post-title no-thumbnail "><a href="{{ $sub->slug }}">{{ $sub->title }}</li>
                                    @endforeach
                                </ul>
                                @endif

                                @if (count($docs) > 0)
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td>Titolo</td>
                                            <td>Protocollo</td>
                                            <td>Descrizione</td>
                                            <td>Data Inserimento</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    @foreach ($docs as $doc)
                                    <tr>
                                        <td>{{ $doc->title }}</td>
                                        <td>{{ $doc->protocol }}</td>
                                        <td>   {!! strip_tags(str_limit($doc->description, $limit = 150, $end = '...')) !!}</td>
                                        <td>{{ \Carbon\Carbon::parse($doc->created_at)->format('d/m/Y') }} alle ore {{ \Carbon\Carbon::parse($doc->created_at)->format('H:i') }}</td>
                                        <td>
                                            <a href="/{{ $doc->attachment }}" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-flat vc_btn3-color-primary">Scarica</a>
                                            <a href="/amministrazione-trasparente/doc/{{ $doc->id }}" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-flat vc_btn3-color-success" value="scarica">Dettagli</a>                                                
                                        </td>
                                    </tr>
                                </table>
                                @endforeach
                                

                                @endif




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