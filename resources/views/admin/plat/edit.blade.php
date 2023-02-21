
@extends('base')

@section('page_title','Plat - Modification')
             

@section('content')

<h1>Admin - Plat - Modification</h1>
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
<form action="{{ route('admin.plat.update', ['id'=> $plat->id])}}" method="post">
@csrf
@method('PUT')
</div>
<div>
    <input class=" @error('nom') form--input--error @enderror"type="text" name="nom" id=""value="{{ old('nom', $plat->nom) }}">
    @error('nom')
        <div class="form--error-message">
        {{ $message }}
        </div>
    @enderror
</div>
<div>
    <input class=" @error('prix') form--input--error @enderror"type="number" name="prix " id=""value="{{ old('prix', $plat->prix) }}">
    @error('prix')
        <div class="form--error-message">
        {{ $message }}
        </div>
    @enderror
</div>
<div>
    <input class=" @error('description') form--input--error @enderror"type="text" name="description" id=""value="{{ old('description', $plat->description) }}">
    @error('description')
    <div class="form--error-message">
    </div>
    @enderror
</div>
<div>
    <input class=" @error('epingle') form--input--error @enderror"type="number" name="epingle" id=""value="{{ old('epingle',$plat->epingle) }}">
    @error('epingle')
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