@extends('base')

@section('page_title','admin - actu -Liste')
             
@section('content')

<h1>Admin - Actu - Liste</h1>
@if (Session::has('confirmation'))
<div>
    {{ Session::get('confirmation') }}
</div>
@endif   
    <div>
        <a href="{{ route('admin.actu.index')}}">Ajouter</a>
    </div>

{{-- {{dump($actu)}} --}}
<TABLE>
    <TBody> 
        <tr>
      <th>jour_publication</th>
      <th>heure_publication</th>
      <th>texte</th>
        <tr>

            {{-- @foreach($actus as $actu)
            <TR>   
                <TD>{{ $actu->nom }} </TD>   
                <TD>{{ $actu->prenom }} </TD>
                <TD>{{ $actu->jour }} </TD>
                <TD>{{ $actu->heure }} </TD> 
                <TD>{{ $actu->nombre_personnes }} </TD>
                <TD>{{ $actu->tel  }} </TD>
                <TD>{{ $actu->email  }} </TD>
                <form action="{{ route('admin.actu.delete',['id' => $actu->id]) }}" method="post"onsubmit="return window.confirm('êtes vous sur de vouloir supprimer cet élement?');">
                @csrf
                @method('DELETE')
                <button type="submit">supprimer</button></form> --}}
                {{-- </TD> --}}
            {{-- </TR> --}}
            {{-- @endforeach --}}
        </TBody>
    </TABLE>

@endsection

