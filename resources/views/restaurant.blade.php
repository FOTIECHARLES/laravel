@extends('base')

@section('page_title','Restaurant')
             

@section('content')

<h1>Restaurant </h1>
<table>
    <TBody> 
        <tr>
      <th>CLE</th>
      <th>VALEUR</th>
        <tr>

            @foreach($restaurants as $restaurant)
            <TR>   
                <TD>{{ $restaurant->cle  }} </TD>   
                <TD>
                    @if($restaurant->cle=='carte')
                      {{-- affichage de la variable tel quelle est tocké en BDD c't'd laravel ne remplace pas les caractères spéciaux les chevron 
                    et les côtes par des entités HTML: rajout des points d'exclamations et suppression d'une accollade{!! $restaurant->valeur !!}--}}
                        {!! $restaurant->valeur !!}
                    @else
                        {{ $restaurant->valeur }}
                    @endif
                </TD>
            </TR>

            @endforeach
        </TBody>
    </table>

@endsection

