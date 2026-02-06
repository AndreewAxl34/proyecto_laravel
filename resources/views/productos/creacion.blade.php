@extends('layouts.trabajo2')
@section('title', 'Entrada de datos')

@section('content')
<div class="todoplantillas">
  <!-----fuentes----->
  <link rel="stylesheet" href="{{ asset('css/colores.css') }}">
   <h2>Alta de producto</h2>
  <!----Enlace relacionado para la funcion---->
   <form method="POST" action="{{ route('productos.tienda') }}">
     @csrf
  <!---Cuerpo de la plantilla--->
     <div>
       <label class="labelCreacion">Descripción</label>
       <input name="descripcion" value="{{ old('descripcion') }}">
     </div>
     <br>
     <div>
       <label class="labelCreacion">Stock</label>
       <input type="number" name="stock" value="{{ old('stock', 0) }}">
     </div>
      <br>
     <div>
       <label class="labelCreacion">Precio</label>
       <input type="number" step="0.01" name="precio" value="{{ old('precio', 0) }}">
     </div>
     <br>
     <div>
      <label class="labelCreacion">Categoría</label>
      <select name="categoria_id">
         <option value="">-- elige categoria --</option>
         @foreach($categorias as $c)
            <option value="{{ $c->id }}" @selected(old('categoria_id') == $c->id)>
              {{ $c->nombre }}
            </option>
       @endforeach
      </select>
     </div>
     <br>
     <div>
      <label class="labelCreacion">Proveedor</label>
      <select name="proveedor_id">
         <option value="">-- elige proveedor --</option>
         @foreach($proveedores as $p)
            <option value="{{ $p->id }}" @selected(old('proveedor_id') == $p->id)>
              {{ $p->nombre }}
            </option>
       @endforeach
      </select>
     </div>
     <button>Guardar</button>
   </form>
    <!---Cuerpo de la plantilla--->
</div>
@endsection