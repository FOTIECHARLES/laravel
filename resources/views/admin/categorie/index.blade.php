@extends('base')

@section('page_title','Admin - Categorie -Liste')
             

@section('content')

<h1>Admin - Categorie - Liste</h1>

@if (Session::has('confirmation'))
<div>
    {{ Session::get('confirmation') }}
</div>
@endif   

{{-- {{dump($categories)}} --}}
<table>
    <thead> 
        <tr>
      <th id="categorie">Nom</th>
      <th id="categorie">Description</th>
      <th id="categorie"><div>
        <a href="{{ route('admin.categorie.create')}}">Ajouter</a>
    </div></th>
        </tr>
        </thead>
    <tbody>
            @foreach($categories as $categorie)
            <tr>   
                <td>{{ $categorie->nom }} </td>   
                <td>{{ $categorie->description }} </td>
                <td><a href="{{ route( 'admin.categorie.edit', ['id' => $categorie->id])}}">modifier</a>
                <form action="{{ route('admin.categorie.delete',['id' => $categorie->id]) }}" method="post"onsubmit="return window.confirm('êtes vous sur de vouloir supprimer cet élement?');">
                @csrf
                @method('DELETE')
                <button type="submit">supprimer</button></form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

