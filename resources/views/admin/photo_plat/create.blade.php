@extends('base')

@section('page_title','Admin - Photo_plat - Création')
             
@section('content')
<h1>Admin - Photo_plat - Création</h1>
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
    <form action="{{ route('admin.photo_plat.store')}}" method="post">
    @csrf
    </div>
    <div>
        <input class=" @error('photo_plat') form--input--error @enderror"type="text" name="photo_plat" id=""value="{{ old('photo_plat', $photo_plat->chemin) }}">
        @error('chemin')
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