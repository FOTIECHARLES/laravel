@extends('base')

@section('page_title','Admin - PhotoAmbiance -Liste')
             

@section('content')

<h1>Admin - PhotoAmbiance - Liste</h1>
@if (Session::has('confirmation'))
<div>
    {{ Session::get('confirmation') }}
</div>
@endif   

{{-- {{dump($photo_ambiances)}} --}}
<table>
    <tbody> 
        <tr>
      <th id="photoambiance">CHEMIN</th>
      <th id="photoambiance">PHOTO</th>
      <th id="photoambiance">ORDRE</th>
      <th id="photoambiance">LEGENDE</th>
      <th id="photoambiance">
        <a href="{{ route('admin.photo_ambiance.create')}}">Ajouter</a></th>
        <tr>

            @foreach($photo_ambiances as $photo_ambiance)
            <TR> 
                <td>{{ $photo_ambiance->chemin  }} </td>  
                <td><img class="admin-liste-img2" src="{{ asset($photo_ambiance->chemin)  }}" alt=""></td>      
                <td>{{ $photo_ambiance->ordre  }} </td>
                <td>{{ $photo_ambiance->legende  }} </td>
                <td><a href="{{ route( 'admin.photo_ambiance.edit', ['id' => $photo_ambiance->id])}}">modifier</a>
                <form action="{{ route('admin.photo_ambiance.delete',['id' => $photo_ambiance->id]) }}" method="post"onsubmit="return window.confirm('êtes vous sur de vouloir supprimer cet élement?');">
                @csrf
                @method('DELETE')
                <button type="submit">supprimer</button></form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

