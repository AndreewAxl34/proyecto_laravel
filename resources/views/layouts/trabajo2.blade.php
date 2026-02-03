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
   <h1>Tienda de Informatica: Frikis-PC</h1>
</header>
<!----Final Cabecera---->
<!---opciones-->
<br>
<nav class="opciones">
    <a href="{{route('home')}}" class="btn btn-primary">OPCION1:Inicio</a>
    <a href="{{route('productos.anadir')}}" class="btn btn-primary">OPCION2_2:Crear Categorias</a>
    <a href="{{route('productos.creacion')}}" class="btn btn-primary">OPCION2_1:Entrada de Datos</a>
    <a href="{{route('productos.index')}}" class="btn btn-primary">OPCION3:Listado General</a>
    <a href="{{route('productos.filtro.form')}}" class="btn btn-primary">OPCION4:Listado Filtrado</a>
    <a href="{{route('productos.manage')}}" class="btn btn-primary">OPCION5:Modificar/Borrar</a>
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