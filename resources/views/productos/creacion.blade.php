@extends('layouts.trabajo2')
@section('title', 'Entrada de datos')

@section('content')
<div>
   <h2>Alta de producto</h2>

   <form method="POST" action="{{ route('productos.tienda') }}">

     @csrf
     <div>
       <label>Descripción</label>
       <input name="descripcion" value="{{ old('descripcion') }}">
     </div>

     <div>
       <label>Stock</label>
       <input type="number" name="stock" value="{{ old('stock', 0) }}">
     </div>
      
     <div>
       <label>Precio</label>
       <input type="number" step="0.01" name="precio" value="{{ old('precio', 0) }}">
     </div>

     <div>
      <label>Categoría</label>
      <select name="categoria_id">
         <option value="">-- elige --</option>
         @foreach($categorias as $c)
            <option value="{{ $c->id }}" @selected(old('categoria_id') == $c->id)>
              {{ $c->nombre }}
            </option>
       @endforeach
      </select>
     </div>

     <button>Guardar</button>
   </form>
</div>
@endsection