@extends('base')

@section('page_title','Admin - Plat - Liste')
             
@section('content')

<h1>Admin - Plat - Liste</h1>
@if (Session::has('confirmation'))
<div>
    {{ Session::get('confirmation') }}
</div>
@endif   

{{-- {{dump($plats)}} --}}
<TABLE>
    <TBody> 
        <tr>
      <th id="plat">Nom</th>
      <th id="plat">Prix</th>
      <th id="plat">Description</th>
      <th id="plat">Epinglé</th>
      <th id="plat"><a href="{{ route('admin.plat.create')}}">Ajouter</a></th>
        <tr>

            @foreach($plats as $plat)
            <TR>   
                <TD>{{ $plat->nom  }} </TD>   
                <TD>{{ $plat->prix  }} </TD>
                <TD>{{ $plat->description  }} </TD>
                <TD>{{ $plat->epingle  }} </TD> 
                <TD><a href="{{ route( 'admin.plat.edit', ['id' => $plat->id])}}">modifier</a> 
                <form action="{{ route('admin.plat.delete',['id' => $plat->id]) }}" method="post"onsubmit="return window.confirm('êtes vous sur de vouloir supprimer cet élement?');">
                @csrf
                @method('DELETE') 
                <button type="submit">supprimer</button></form>
                </TD>
            </TR>
            @endforeach
        </TBody>
    </TABLE>


@endsection