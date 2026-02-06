<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Tienda Informatica')</title>
<!---fuentes---->
    <link rel="stylesheet" href="{{ asset('css/colores.css') }}">
 
<!---final de fuentes--->
</head>
<body>
<!-----Cabebera----->
<header class="cabecera">
   <h1>Tienda de Informatica: Cyber-Freak</h1>
</header>
<!----Final Cabecera---->
<!---opciones-->
<nav class="opciones">
  <div style="
       font-size: 42px; 
       position:relativa;
       margin:-60px;
       margin-top:30px;
       margin-left:-1820px;">💻</div>
  <br>
    <a href="{{route('home')}}" class="enlaces">Inicio</a>
    <a href="{{route('productos.anadirproveedor')}}" class="enlaces">Añadir Proveedor</a>
    <a href="{{route('productos.anadircategoria')}}" class="enlaces">Añadir Categoria</a>
    <a href="{{route('productos.creacion')}}" class="enlaces">Entrada de Datos</a>
    <a href="{{route('productos.index')}}" class="enlaces">Listado General</a>
    <a href="{{route('productos.filtro.form')}}" class="enlaces">Listado Filtrado</a>
    <a href="{{route('productos.manage')}}" class="enlaces">Modificar/Borrar</a>
    <a href="{{route('productos.realizarcompra')}}" class="enlaces">Compra</a>
  <div style="
       font-size: 42px; 
       margin-left:1770px; 
       position: relative;
       top:-30px;">🖥️</div>
</nav>
<!----Final opciones---->
<!----cuerpo----->
<main class="cuerpo">
  @if(session('ok'))
    <div>{{ session('ok') }}</div>
   @endif

   @if($errors->any())
    <div>
       <ul>
         @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
       </ul>
      </div>
   @endif
@yield('content')
<br>
</main>

<!----Final cuerpo---->
<!----pie de la pagina---->
<footer class="piedepagina">
  <div class="container">
    <p class="textoPie">Desarrollado por: Andreew Govea</p>
  <div>
</footer>
<!----Final pie de la pagina---->
</body>
</html>