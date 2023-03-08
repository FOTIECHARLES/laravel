@extends('base')

@section('page_title','actu')
             
@section('content')

<h1> Actualité </h1>


{{-- {{dump($actu)}} --}}
<table>
    <tbody> 
        <tr>
      <th class="admin-actu-tableau">jour_publication</th>
      <th class="admin-actu-tableau">heure_publication</th>
      <th class="admin-actu-tableau">texte</th>
     
        <tr>
            @foreach($actus as $actu)
            <tr>   
                <td>{{ $actu->jour_publication  }} </td>   
                <td>{{ $actu->heure_publication  }} </td>
                <td>{{ $actu->texte  }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

