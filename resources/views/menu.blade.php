@extends('base')

@section('page_title', 'menu')

          
@section('content')
     <h1 > Menu</h1>

{{--@foreach($categories as $categorie)
    <h2 class="menu--categorie-nom">{{ $categorie->nom }} </h2>
    <p class="menu--categorie-description">{{ $categorie->description}}</p>
    
    <ul class="menu--categorie">
        @foreach ($categorie->platsSorteByPrix as $plat)
        <li>--}}
            {{-- {{ $plat->photo->chemin }} --}}
       {{--     <img class="menu--photo-plat" src="{{ asset($plat->photo->chemin) }}" alt="">
            {{ $plat->nom }} {{ $plat->prix }} euros<br>
            {{ $plat->description }}<br>
            </tr>
            @foreach($plat->etiquettes as $etiquette)
                #{{$etiquette->nom}}
            @endforeach
        </li>
        @endforeach
    </ul>
@endforeach--}}

<h2> Carte du jour </h2>
<p class="carte">Ananas</p>
<p class="carte">Baton de manioc avec met de pistache</p>
<p class="carte">Salade</p>
<p class="carte">Jus de Foloré</p>
  <table class="menu-carte">
<thead>
    <th>Entrée</th>
    <th>Plat</th>
</thead>
    <tbody>
    <ul>
        <tr>
  <td><img class="menu-categorie-photo" src="img/plats/gabriel-yuji-Kr6Z_AbeItk-unsplash(4).jpg" alt="img/plats/gabriel-yuji-Kr6Z_AbeItk-unsplash(4).jpg" title="ananas"></td>
  <td><img class="menu-categorie-photo" src="img/plats/pistache_avec_tubercule_de_manioc_image2.jpg" alt="img/plats/pistache_avec_tubercule_de_manioc_image2.jpg" title="Baton de manioc avec met de pistache"></td>
        </tr>
    </ul>
    </tbody>
    </table>
<table class="menu-carte">
<thead>
    <th>Dessert</th>
    <th>Boisson</th>
</thead>
    <tbody>
    <ul>
        <tr>
    <td><img class="menu-categorie-photo" src="img/plats/mariana-medvedeva-fk6IiypMWss-unsplash.jpg" alt="img/plats/mariana-medvedeva-fk6IiypMWss-unsplash.jpg" title="Salade"></td>
    <td><img class="menu-categorie-photo" src="img/plats/alex-lvrs-HDjExSGuWUw-unsplash.jpg" alt="img/plats/alex-lvrs-HDjExSGuWUw-unsplash.jpg" title="Jus de Foloré"></td>
        </tr>
    </ul>
    </tbody>
</table>

@endsection
