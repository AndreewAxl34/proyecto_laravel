@extends('layouts.trabajo2')
@section('title', 'Realizar  compra')

@section('content')
<div class="todoplantillas">
<!-----fuentes----->
  <link rel="stylesheet" href="{{ asset('css/colores.css') }}">
    <h2>Productos</h2>
    <table>
        <thead>
           <tr>
            <th>ID</th>
            <th>Proovedor</th>
            <th>Producto</th>
            <th>Cantidad</th>
          </tr>
       </thead>
     <tbody>
      @forelse($compras as $c)
       <tr>
         <td>{{ $c->id }}</td>
         <td>{{ $c->productos?->nombre }}</td>
         <td>{{ $c->proveedor?->nombre }}</td>
         <td>{{ $c->cantidad }}</td>
       </tr>
      @empty
      <tr>
         <td colspan="5">No hay compras.</td>
      </tr>
      @endforelse
     </tbody>
    </table>
</div>

@endsection