@extends('base')

@section('page_title','Admin -PhotoAmbiance- Modification')
             

@section('content')

<h1>Admin - photo_ambiance - Modification</h1>
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
    <form action="{{ route('admin.photo_ambiance.update', ['id'=> $photo_ambiance->id])}}" method="post">
    @csrf
    @method('PUT')
    </div>
    <div>
        <label for="chemin">Chemin</label>
        <input class=" @error('chemin') form--input--error @enderror"type="text" name="chemin" id=""value="{{ old('chemin', $photo_ambiance->chemin) }}">
        @error('chemin')
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
        <label for="legende">Legende</label>
        <input class=" @error('legende') form--input--error @enderror"type="text" name="legende" id=""value="{{ old('legende', $photo_ambiance->legende) }}">
        @error('legende')
        <div class="form--error-message">
       La date doit être le legende même ou un legende ultérieur
        </div>
        @enderror
    </div>
    <div>
     <button type="submit">Valider</button>
    </div>   
    </form>
    @endsection