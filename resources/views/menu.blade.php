@extends('base')

@section('page_title', 'menu')
             

@section('content')
     <h1>Menu</h1>

@foreach($categories as $categorie)
    <h2>{{ $categorie->nom }} </h2>
    <p>{{ $categorie->description}}</p>
    
    <ul>
        @foreach ($categorie->platsSorteByPrix as $plat)
        <li>
            {{ $plat->nom }} {{ $plat->prix }} eur<br>
            {{ $plat->description }}<br>
            @foreach($plat->etiquettes as $etiquette)
                #{{$etiquette->nom}}
            @endforeach
        </li>
        @endforeach
    </ul>
@endforeach

<strong>poulet avec de la sauce arachide</strong><br/>
<strong>couscous                        </strong><br/>

<img class= "medium size"  src="{{asset('img/pexels-engin-akyurt-2673353(1).jpg')}}" alt="Poulet Cuit Sur Plaque Blanche · Photo gratuite">


@endsection
