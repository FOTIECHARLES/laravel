@extends('base')

@section('page_title','Admin - photo_ambiance - Création')
             

@section('content')

<h1>Admin - photo_ambiance - Création</h1>
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
    <form action="{{ route('admin.photo_ambiance.store')}}" method="post">
    @csrf
    </div>
    <div>
        <label for="chemin">Chemin</label>
        <input class=" @error('chemin') form--input--error @enderror"type="text" name="chemin" id=""value="{{ old('chemin', $photo_ambiance->chemin ) }}">
        @error('chemin ')
            <div class="form--error-message">
            {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <label for="ordre">Ordre</label>
        <input class=" @error('ordre') form--input--error @enderror"type="number" name="ordre" id=""value="{{ old('ordre', $photo_ambiance->ordre) }}">
        @error('ordre')
            <div class="form--error-message">
            {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <label for="legende">Légende</label>
        <input class=" @error('legende ') form--input--error @enderror"type="text" name="legende " id=""value="{{ old('legende ', $photo_ambiance->legende ) }}">
        @error('legende ')
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