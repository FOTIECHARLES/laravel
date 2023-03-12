@extends('base')

@section('page_title',' Réservation ')
             

@section('content')

<h1> Réservation </h1>
    @if (Session::has('confirmation'))
        <div>
            {{ Session::get('confirmation') }}
        </div>
    @endif

    @if ($errors->any())
    <div>
        Attention, les données n'ont pas été enregistrées, il y'a des erreurs dans le formulaire.
    </div>
    @endif
    <section class="reservation-section-formulaire">
    <div>
    <form action="{{ route('reservation')}}" method="post">
    @csrf
    </div>
    <div>
        <label for="nom">Nom</label>
        <input class=" @error('nom') form--input--error @enderror"type="text" name="nom" id=""value="{{ old('nom', $reservation->nom) }}">
        @error('nom')
            <div class="form--error-message">
            {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <label for="prenom">Prenom</label>
        <input class=" @error('prenom') form--input--error @enderror"type="text" name="prenom" id=""value="{{ old('prenom', $reservation->prenom) }}">
        @error('prenom')
            <div class="form--error-message">
            {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <label for="jour">Jour</label>
        <input class=" @error('jour') form--input--error @enderror"type="date" name="jour" id=""value="{{ old('jour', $reservation->jour) }}">
        @error('jour')
        <div class="form--error-message">
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <label for="heure">Heure</label>
        <input class=" @error('heure') form--input--error @enderror"type="time" name="heure" id=""value="{{ old('heure', $reservation->heure) }}" >
        @error('heure')
        <div class="form--error-message">
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <label for="nombre_personnes">Nombre_personnes</label>
        <input class=" @error('nombre_personnes') form--input--error @enderror"type="number" name="nombre_personnes" id=""value="{{ old('nombre_personnes', $reservation->nombre_personnes) }}">
        @error('nombre_personnes')
        <div class="form--error-message">
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <label for="tel">Téléphone</label>
        <input class=" @error('tel') form--input--error @enderror"type="tel" name="tel" id=""value="{{ old('tel', $reservation->tel) }}"placeholder="06 44 00 00 00">
        @error('tel')
        <div class="form--error-message">
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <label for="email">Mail</label>
        <input class=" @error('email') form--input--error @enderror"type="email" name="email" id=""value="{{ old('email',$reservation->email) }}">
        @error('email')
        <div class="form--error-message">
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
     <button type="submit">Valider</button>
    </div>   
    </form>
    </section>
    

@endsection