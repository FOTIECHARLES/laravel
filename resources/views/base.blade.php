<!DOCTYPE html>
<html lang="{{ config('app.locale')  }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{  config('app.name') }} @yield('page_title')</title>
    @section('vite')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @show 
</head>
<body>
<header>
    <nav>   
        <ul>
            @auth
            <li><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
        @else
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('menu') }}">Menu</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('reservation') }}">Réservation</a></li>
            <li><a href="{{ route('actu') }}">Actualité</a></li>
            <li><a href="{{ route('restaurant') }}">Restaurant</a></li>
            @guest
                <li><a href="{{ route('login') }}">Connexion</a></li>
            @endguest  
        @endauth
        </ul>    
   </nav>
</header>  

    @section('content')
    @show    
    <footer>
        <nav>   
            <ul>
                <li><a href="{{route('home')}}">Accueil</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li><a href="{{route('mentions-legales')}}">Mentions légales</a></li>   
                <li> Copyright FOTIE CHARLES 2023 </li>
            </ul>    
       </nav>  
    </footer>    
</body>
</html>