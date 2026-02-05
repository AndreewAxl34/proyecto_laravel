@extends('layouts.trabajo2')
@section('title', 'Listado general')

@section('content')
<div class="todoplantillas">
<!-----fuentes----->
  <link rel="stylesheet" href="{{ asset('css/colores.css') }}">
    <h2>Productos</h2>
    <table>
        <thead>
           <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Proveedor</th>
          </tr>
       </thead>
     <tbody>
      @forelse($productos as $p)
       <tr>
         <td>{{ $p->id }}</td>
         <td>{{ $p->descripcion }}</td>
         <td>{{ $p->stock }}</td>
         <td>{{ number_format($p->precio, 2) }}</td>
         <td>{{ $p->categoria?->nombre }}</td>
         <td>{{ $p->proovedor?->nombre }}</td>
       </tr>
      @empty
      <tr>
         <td colspan="5">No hay productos.</td>
      </tr>
      @endforelse
     </tbody>
    </table>
</div>
@endsection