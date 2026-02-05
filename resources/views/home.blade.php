@extends('layouts.trabajo2')
@section('title', 'Bienvenido')
@section('content')
<div class="todoplantillas">
<!-----fuentes----->
  <link rel="stylesheet" href="{{ asset('css/colores.css') }}">
    <h2>Bienvenido a mi pagina web :)</h2>
     <p>Usa los botones superiores para gestionar el inventario.</p>
     <p> Este es el trabajo de laravel</p>

     <img class="logo" src="{{ asset('/images/Cyber_transparente.png') }}" alt="Cyber_transparente" width="890" height="600">

</div>
@endsection