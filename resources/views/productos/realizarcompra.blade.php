@extends('layouts.trabajo2')
@section('title', 'Realizar  compra')

@section('content')
 <div class="todoplantillas">
<!-----fuentes----->
  <link rel="stylesheet" href="{{ asset('css/colores.css') }}">
    <h2>Realizas Compra</h2>
     <form method="POST" action="{{ route('productos.compraresultado') }}">
      @csrf

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

      <div>
      <label class="labelCreacion">Producto</label>
      <select name="productos_id">
         <option value="">-- elige producto --</option>
         @foreach($productos as $pro)
            <option value="{{ $pro->id }}" @selected(old('productos_id') == $pro->id)>
              {{ $pro->nombre }}
            </option>
       @endforeach
      </select>
     </div>

     <div>
       <label class="labelCreacion">Cantidad</label>
       <input type="number" name="Cantidad" value="{{ old('Cantidad', 0) }}">
     </div>

     <button>Realizar Compra</button>
    </form>
</div>
@endsection