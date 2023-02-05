@extends('base')

@section('page_title','Admin - Réservation -Liste')
             

@section('content')

<h1>Admin - Réservation - Liste</h1>
@if (Session::has('confirmation'))
<div>
    {{ Session::get('confirmation') }}
</div>
@endif   
    <div>
        <a href="{{ route('admin.reservation.create')}}">Ajouter</a>
    </div>

{{-- {{dump($reservations)}} --}}
<TABLE>
    <TBody> 
        <tr>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Jour</th>
      <th>Heure</th>
      <th>Nombre de Personne</th>
      <th> tel </th>
      <th>Email </th>
      <th>actions</th>
        <tr>

            @foreach($reservations as $reservation)
            <TR>   
                <TD>{{ $reservation->nom }} </TD>   
                <TD>{{ $reservation->prenom }} </TD>
                <TD>{{ $reservation->jour }} </TD>
                <TD>{{ $reservation->heure }} </TD> 
                <TD>{{ $reservation->nombre_personnes }} </TD>
                <TD>{{ $reservation->tel  }} </TD>
                <TD>{{ $reservation->email  }} </TD>
                <TD><a href="{{ route( 'admin.reservation.edit', ['id' => $reservation->id])}}">modifier</a>
                <form action="{{ route('admin.reservation.delete',['id' => $reservation->id]) }}" method="post"onsubmit="return window.confirm('êtes vous sur de vouloir supprimer cet élement?');">
                @csrf
                @method('DELETE')
                <button type="submit">supprimer</button></form>
                </TD>
            </TR>
            @endforeach
        </TBody>
    </TABLE>

@endsection

