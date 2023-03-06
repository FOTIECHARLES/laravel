@extends('base')

@section('page_title','Admin - Etiquette -Liste')
             

@section('content')

<h1>Admin - Etiquette - Liste</h1>
@if (Session::has('confirmation'))
<div>
    {{ Session::get('confirmation') }}
</div>
@endif   
    
{{-- {{dump($etiquettes)}} --}}
<TABLE>
    <TBody> 
        <tr>
      <th id="etiquette">Nom</th>
      <th id="etiquette">Description</th>
      <th id="etiquette"> <a href="{{ route('admin.etiquette.create')}}">Ajouter</a></th>
        <tr>
            @foreach($etiquettes as $etiquette)
            <TR>   
                <TD>{{ $etiquette->nom }} </TD>   
                <TD>{{ $etiquette->description  }} </TD>
                <TD><a href="{{ route( 'admin.etiquette.edit', ['id' => $etiquette->id])}}">modifier</a>
                <form action="{{ route('admin.etiquette.delete',['id' => $etiquette->id]) }}" method="post"onsubmit="return window.confirm('êtes vous sur de vouloir supprimer cet élement?');">
                @csrf
                @method('DELETE')
                <button type="submit">supprimer</button></form>
                </TD>
            </TR>
            @endforeach
        </TBody>
    </TABLE>

@endsection

