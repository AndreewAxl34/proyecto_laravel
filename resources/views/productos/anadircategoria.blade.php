@extends('layouts.trabajo2')
@section('title', 'Añadir categoria')

@section('content')
<div class="todoplantillas">
<!-----fuentes----->
  <link rel="stylesheet" href="{{ asset('css/colores.css') }}">
    <h2>Añadir la categoria<h2>

    <form method="POST" action="{{ route('categorias.guardar') }}">
        @csrf

        <div>
          <label>Nombre de la categoria</label>
          <input name="nombre" value="{{ old('nombre') }}">
        </div>

        <button>Guardar categoria</button>

         <br><br>
        <table>
          <thead>
            <tr>
                <th>Categoria</th> 
            </tr>
          </thead>  
          <tbody>
          @forelse($categorias as $c)
            <tr>
                <td>{{ $c-> nombre }}</td>
            </tr>
            @empty
            <tr>
                <td copslan="5">No hay categorias</td>
            </tr>
          @endforelse
          </tbody>
        </table>
    </form>
</div>
@endsection
        