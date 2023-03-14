@extends('base')

@section('page_title','dashboard')
             
@section('content')
<h1 class="Dashbord">Tableau de bord</h1>
<nav class="Dashbord">   
    <ul>
        @auth
        <li><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
        <li><a href="{{ route('admin.reservation.index') }}">Réservation </a></li>
        <li><a href="{{ route('admin.actu.index') }}">Actualité </a></li>
        <li><a href="{{ route('admin.etiquette.index') }}">Etiquette </a></li>
        <li><a href="{{ route('admin.categorie.index') }}">Categorie </a></li>
        <li><a href="{{ route('admin.photo_plat.index') }}">Photo_plat </a></li>
        <li><a href="{{ route('admin.photo_ambiance.index') }}">PhotoAmbiance </a></li>
        <li><a href="{{ route('admin.plat.index') }}">Plat</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">déconnexion</a>
            </form>
        </li>
    @endauth
    </ul>
</nav> 
@endsection