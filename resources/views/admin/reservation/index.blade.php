@extends('base')

@section('page_title','Admin - Réservation -Liste')
             

@section('content')

<h1>Admin - Réservation - Liste</h1>
    
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
                </TD>
            </TR>
            @endforeach
        </TBody>
    </TABLE>

@endsection

