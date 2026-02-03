@extends('layouts.trabajo2')
@section('title', 'Listado filtrado')
@section('content')
<div>
   <h2>Filtrar productos</h2>

   <form method="GET" action="{{ route('productos.filtro.results') }}">
     <div>
       <label>Criterio</label>
       <select name="criterion">
         <option value="stock_bajo">Stock bajo (<= 5)</option>
         <option value="stock_alto">Stock alto (>= 20)</option>
         <option value="precio_alto">Precio Alto (>= 900)</option>
         <option value="precio_bajo">Precio barato (<= 50)</option>
       </select>
     </div>
     <button>Aplicar filtro</button>
   </form>
</div>
@endsection