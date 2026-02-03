@extends('layouts.trabajo2')
@section('title', 'Añadir categoria')

@section('content')
<div>
    <h2>Añadir la categoria<h2>

    <form method="POST" action="{{ route('categorias.guardar') }}">
        @csrf

        <div>
          <label>Nombre de la categoria</label>
          <input name="nombre" value="{{ old('nombre') }}">
        </div>

        <button>Guardar categoria</button>
    </form>
</div>
@endsection
        