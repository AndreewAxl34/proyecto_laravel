@extends('layouts.trabajo2')
@section('title', 'Modificar / Borrar')

@section('content')
 <div>
    <h2>Gestionar productos</h2>

    <table>
     <thead>
       <tr>
         <th>ID</th>
         <th>Descripción</th>
         <th>Categoría</th>
         <th>Acciones</th>
       </tr>
     </thead>
     <tbody>
       @foreach($productos as $p)
       <tr>
         <td>{{ $p->id }}</td>
         <td>{{ $p->descripcion }}</td>
         <td>{{ $p->categoria?->nombre }}</td>
         <td>
           <a href="{{ route('productos.edit', $p) }}">Editar</a>

           <form method="POST" action="{{ route('productos.destruir', $p) }}">
            @csrf
            @method('DELETE') 
            <button onclick="return confirm('¿Borrar producto?')">
             Borrar
            </button>
           </form>
         </td>
       </tr>
       @endforeach
     </tbody>
    </table>
</div>
@endsection