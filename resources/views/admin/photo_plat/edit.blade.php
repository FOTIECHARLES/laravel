@extends('base')  

@section('page_title','Admin - Photo_plat - Modification')
        
@section('content')
  
<h1>Admin - Photo_plat - Modification</h1>

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
<form action="{{ route('admin.photo_plat.update', ['id'=> $photo_plat->id])}}" method="post">
@csrf
@method('PUT')
</div>
<div>
    <input class=" @error('chemin') form--input--error @enderror"type="text" name="chemin" id=""value="{{ old('chemin', $photo_plat->chemin) }}">
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