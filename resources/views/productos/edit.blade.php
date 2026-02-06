@extends('layouts.trabajo2')
@section('title', 'Editar producto')

@section('content')
 <div class="todoplantillas">
<!-----fuentes----->
  <link rel="stylesheet" href="{{ asset('css/colores.css') }}">
    <h2>Editar producto #{{ $productos->id }}</h2>
     <form method="POST" action="{{ route('productos.actualizar', $productos) }}">
      @csrf
      @method('PUT')

    <div>
      <label>Descripción</label>
      <input name="descripcion" value="{{ old('descripcion', $productos->descripcion) }}">
    </div>

    <div>
      <label>Stock</label>
      <input type="number" name="stock" value="{{ old('stock', $productos->stock) }}">
    </div>

    <div>
      <label>Precio</label>
      <input type="number" step="0.01" name="precio" value="{{ old('precio', $productos->precio) }}">
    </div>

    <div>
      <label>Categoría</label>
      <select name="categoria_id">
         @foreach($categorias as $c)
           <option value="{{ $c->id }}" @selected(old('categoria_id', $productos->categoria_id) == $c->id)>
              {{ $c->nombre }}
           </option>
        @endforeach
      </select>
    </div>

      <div>
      <label>Proveedor</label>
      <select name="proveedor_id">
         @foreach($proveedores as $p)
           <option value="{{ $p->id }}" @selected(old('proovedor_id', $productos->proveedor_id) == $p->id)>
              {{ $p->nombre }}
           </option>
        @endforeach
      </select>
    </div>

     <button>Guardar cambios</button>
    </form>
</div>
@endsection