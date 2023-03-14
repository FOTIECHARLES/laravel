@extends('base')

@section('page_title','Admin - Categorie -Création')
             

@section('content')

<h1>Admin - Categorie - Création</h1>
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
    <form action="{{ route('admin.categorie.store')}}" method="post">
    @csrf
    </div>
    <div>
        <label for="nom">Nom</label>
        <input class=" @error('nom') form--input--error @enderror"type="text" name="nom" id=""value="{{ old('nom', $categorie->nom) }}">
        @error('nom')
            <div class="form--error-message">
            {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <label for="description">Description</label>
        <input class=" @error('description') form--input--error @enderror"type="text" name="description" id=""value="{{ old('description', $categorie->description) }}">
        @error('description')
            <div class="form--error-message">
            {{ $message }}
            </div>
        @enderror
    </div>
    <div>
     <button type="submit">Valider</button>
    </div>   
    </form>
    

@endsection