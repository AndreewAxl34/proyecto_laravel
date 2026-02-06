@extends('layouts.trabajo2')
@section('title', 'Modificar / Borrar')

@section('content')
 <div class="todoplantillas">
<!-----fuentes----->
  <link rel="stylesheet" href="{{ asset('css/colores.css') }}">
    <h2>Gestionar productos</h2>

    <table>
     <thead>
       <tr>
          <th>ID</th>
          <th>Descripción</th>
          <th>Stock</th>
          <th>Precio</th>
          <th>Categoría</th>
          <th>Proveedor</th>
         <th>Acciones</th>
       </tr>
     </thead>
     <tbody>
       @foreach($productos as $p)
       <tr>
         <td>{{ $p->id }}</td>
         <td>{{ $p->descripcion }}</td>
         <td>{{ $p->stock }}</td>
         <td>{{ number_format($p->precio, 2) }}</td>
         <td>{{ $p->categoria?->nombre }}</td>
         <td>{{ $p->proveedor?->nombre }}</td>
         <td>
           <a class="otra" href="{{ route('productos.edit', $p) }}">Editar</a>

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