@extends('layouts')
@section('content')

 <p class="lead">Bienvenido : {{ Auth::user()->nombre  }}
 {{ ' -  '}}  {{ 'Usuario'}}  {{ '  :  '}} {{ Auth::user()->usuario  }}  </p> 


<hr>
<hr>




  	




@stop


