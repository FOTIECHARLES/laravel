@extends('base')

@section('page_title', 'menu')

          

@section('content')
     <h1 > Menu</h1>

@foreach($categories as $categorie)
    <h2 class="menu--categorie-nom">{{ $categorie->nom }} </h2>
    <p class="menu--categorie-description">{{ $categorie->description}}</p>
    
    <ul class="menu--categorie">
        @foreach ($categorie->platsSorteByPrix as $plat)
        <li>
            {{-- {{ $plat->photo->chemin }} --}}
            <img class="menu--photo-plat" src="{{ asset($plat->photo->chemin) }}" alt="">
            {{ $plat->nom }} {{ $plat->prix }} euros<br>
            {{ $plat->description }}<br>
            </tr>
            @foreach($plat->etiquettes as $etiquette)
                #{{$etiquette->nom}}
            @endforeach
        </li>
        @endforeach
    </ul>
@endforeach

@endsection
