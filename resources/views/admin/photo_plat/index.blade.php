@extends('base')

@section('page_title','Admin - Photo_plat - Liste')
             
@section('content')
<h1>Admin - Photo_plat - Liste</h1>

@if (Session::has('confirmation'))
<div>
    {{ Session::get('confirmation') }}
</div>
@endif   
    <div>
        <a href="{{ route('admin.photo_plat.create')}}">Ajouter</a>
    </div>

{{-- {{dump($photo_plats)}} --}}
<table>
    <tbody> 
        <tr>
      <th>chemin </th>
      <th>img </th>
        <tr>

            @foreach($photo_plats as $photo_plat)
            <TR>   
                <TD>{{ $photo_plat->chemin  }} </TD>   
                <TD><img class="admin-liste-img" src="{{ asset($photo_plat->chemin)  }}" alt=""></TD>   
                <TD><a href="{{ route( 'admin.photo_plat.edit', ['id' => $photo_plat->id])}}">modifier</a>
                <form action="{{ route('admin.photo_plat.delete',['id' => $photo_plat->id]) }}" method="post"onsubmit="return window.confirm('êtes vous sur de vouloir supprimer cet élement?');">
                @csrf
                @method('DELETE')
                <button type="submit">supprimer</button></form>
                </TD>
            </TR>
            @endforeach
        </tbody>
    </table>

@endsection

