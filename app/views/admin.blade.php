@extends('layouts')
@section('content')

 <p class="lead">Bienvenido : {{ Auth::user()->usuario  }}</p> 

<hr>
<hr>
@stop


