@extends('base')

@section('page_title','Admin - Categorie -Liste')
             

@section('content')

<h1>Admin - Categorie - Liste</h1>

@if (Session::has('confirmation'))
<div>
    {{ Session::get('confirmation') }}
</div>
@endif   
    <div>
        <a href="{{ route('admin.categorie.create')}}">Ajouter</a>
    </div>

{{-- {{dump($categories)}} --}}
<TABLE>
    <TBody> 
        <tr>
      <th>Nom</th>
      <th>Description</th>
        <tr>

            @foreach($categories as $categorie)
            <TR>   
                <TD>{{ $categorie->nom }} </TD>   
                <TD>{{ $categorie->description }} </TD>
                <TD><a href="{{ route( 'admin.categorie.edit', ['id' => $categorie->id])}}">modifier</a>
                <form action="{{ route('admin.categorie.delete',['id' => $categorie->id]) }}" method="post"onsubmit="return window.confirm('êtes vous sur de vouloir supprimer cet élement?');">
                @csrf
                @method('DELETE')
                <button type="submit">supprimer</button></form>
                </TD>
            </TR>
            @endforeach
        </TBody>
    </TABLE>

@endsection

