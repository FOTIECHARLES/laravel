@extends('base')

@section('page_title','admin - actu -création')
             
@section('content')
<h1>Admin - Actu - Creation</h1>
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
        <form action="{{ route('admin.actu.store')}}" method="post">
        @csrf
        </div>
        <div>
        <label>jour_publication</label>
        <input class=" @error('jour_publication') form--input--error @enderror"type="date" name="jour_publication" id="" value="{{ old('jour_publication', $actu->jour_publication) }}">
        @error('jour_publication')
            <div class="form--error-message">
            {{ $message }}
            </div>
        @enderror
        </div>
        <div>
        <label>Heure_publication</label>
        <input class=" @error('heure_publication') form--input--error @enderror"type="datetime" name="heure_publication" id="" value="{{ old('heure_publication', $actu->heure_publication) }}">
        @error('heure_publication')
            <div class="form--error-message">
            Veuillez saisir une heure valide!
            </div>
        @enderror
        </div>
        <div>
        <label>texte</label>
        <input class=" @error('texte') form--input--error @enderror"type="text" name="texte" id=""value="{{ old('texte', $actu->texte) }}">
        @error('texte')
        <div class="form--error-message">
        {{ $message }}
        </div>
        @enderror
        <div>
        <button type="submit">Valider</button>
        </div>   
        </form>


        @endsection