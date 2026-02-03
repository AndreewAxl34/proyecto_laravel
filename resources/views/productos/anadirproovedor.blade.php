@extends('layouts.trabajo2')
@section('title', 'Añadir proovedor')

@section('content')
<div>
    <h2>Añadir la proovedor<h2>

    <form method="POST" action="{{ route('proovedores.guardar') }}">
        @csrf

        <div>
          <label>Nombre de la Proovedor</label>
          <input name="nombre" value="{{ old('nombre') }}">
        </div>

        <button>Guardar Proovedor</button>
    </form>
</div>
@endsection
        