@extends('layouts.trabajo2')
@section('title', 'Añadir proovedor')

@section('content')
<div class="todoplantillas">
 <!-----fuentes----->
  <link rel="stylesheet" href="{{ asset('css/colores.css') }}">
    <h2>Añadir la Proveedor<h2>

    <form method="POST" action="{{ route('proveedores.guardar') }}">
        @csrf

        <div>
          <label>Nombre de la Proveedor</label>
          <input name="nombre" value="{{ old('nombre') }}">
        </div>

        <button>Guardar Proveedor</button>
          <br><br>
     <table>
          <thead>
            <tr>
                <th>Proveedores</th> 
            </tr>
          </thead>  
          <tbody>
          @forelse($proveedores as $p)
            <tr>
                <td>{{ $p-> nombre }}</td>
            </tr>
            @empty
            <tr>
                <td copslan="5">No hay proveedores</td>
            </tr>
               </form>
          @endforelse
          </tbody>
        </table>
    </form>
</div>
@endsection
        