@extends('base')

@section('page_title','Admin - Réservation -Liste')
             

@section('content')

<h1>Admin - Réservation - Liste</h1>
@if (Session::has('confirmation'))
<div>
    {{ Session::get('confirmation') }}
</div>
@endif   

{{-- {{dump($reservations)}} --}}
<TABLE>
    <TBody> 
        <tr>
      <th id="reservation">Nom</th>
      <th id="reservation">Prenom</th>
      <th id="reservation">Jour</th>
      <th id="reservation">Heure</th>
      <th id="reservation">Nombre de Personne</th>
      <th id="reservation"> tel </th>
      <th id="reservation">Email </th>
      <th id="reservation">actions</th>
        <tr>

            @foreach($reservations as $reservation)
            <TR>   
                <td>{{ $reservation->nom }} </td>   
                <td>{{ $reservation->prenom }} </td>
                <td>{{ $reservation->jour }} </td>
                <td>{{ $reservation->heure }} </td> 
                <td>{{ $reservation->nombre_personnes }} </td>
                <td>{{ $reservation->tel  }} </td>
                <td>{{ $reservation->email  }} </td>
                <td><a href="{{ route('admin.reservation.create')}}">Ajouter</a>
                    <a href="{{ route( 'admin.reservation.edit', ['id' => $reservation->id])}}">modifier</a>
                <form action="{{ route('admin.reservation.delete',['id' => $reservation->id]) }}" method="post"onsubmit="return window.confirm('êtes vous sur de vouloir supprimer cet élement?');">
                @csrf
                @method('DELETE')
                <button type="submit">supprimer</button></form>
                </td>
            </TR>
            @endforeach
        </TBody>
    </TABLE>

@endsection

