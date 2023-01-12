@extends('base')

@section('page_title', 'menu')
             

@section('content')

<h1>Menu</h1>
<ul>
@foreach($categories as $categorie)
       <li>{{ $categorie->nom }} {{ $categorie->description}}</li>
@endforeach
</ul>
<strong>poulet avec de la sauce arachide</strong><br/>
<strong>couscous                        </strong><br/>

<img class= "medium size"  src="{{asset('img/pexels-engin-akyurt-2673353(1).jpg')}}" alt="Poulet Cuit Sur Plaque Blanche · Photo gratuite">


@endsection
