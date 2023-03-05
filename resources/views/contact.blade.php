@extends('base')

@section('page_title', 'Contact')
             

@section('content')

<h1>Contact</h1>
<strong>O.cnamo@gmail.com</strong><br/>
<strong>+ 33 0000000000                        </strong><br/>
    
<p>{{ $adresse }}</p>
<p>{{$tel}}     </p>
<p>{{$horaire}} </p>
<p>{!!$carte!!} </p>

@endsection