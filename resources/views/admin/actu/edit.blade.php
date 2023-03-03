@extends('base')

@section('page_title','admin - actu -Modification')
             
@section('content')

<h1>Admin - Actu - Modification</h1>
    {{-- {{confirmation permet de voir les modifications appliquées dans le formulaire grâce à Session}} --}}
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

    <div>
    <form action="{{ route('admin.actu.update', ['id'=> $actu->id])}}" method="post">
    @csrf
    @method('PUT')
    </div>
    <div>
        <input class=" @error('jour_publication') form--input--error @enderror"type="datetime" name="jour_publication" id=""value="{{ old('jour_publication', $actu->jour_publication) }}">
        @error('jour_publication')
            <div class="form--error-message">
            {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <input class=" @error('heure_publication') form--input--error @enderror"type="time" name="heure_publication" id=""value="{{ old('heure_publication', $actu->prenom) }}">
        @error('heure_publication')
            <div class="form--error-message">
            {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <input class=" @error('texte ') form--input--error @enderror"type="date" name="texte " id=""value="{{ old('texte ', $actu->texte ) }}">
        @error('texte ')
        <div class="form--error-message">
       La date doit être le texte  même ou un texte  ultérieur
        </div>
        @enderror
    </div>
    <div>
     <button type="submit">Valider</button>
    </div>   
    </form>
    @endsection