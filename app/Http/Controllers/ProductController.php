<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Proovedores;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductController extends Controller
{ 
    // Opcion2 Añadir Proovedor
    public function anadirproovedor(){
        $proovedores=Proovedores::orderBy('nombre')->get();
        return view('productos.anadirproovedor',compact('proovedores'));
    }

     // Opcion2_1 Guardar Proovedor
    public function prove(Request $request){
        $data = $request->validate([
            'nombre' => 'required|min:3'
        ]);
        Categoria::create($data);
        return redirect()->route('productos.anadirproovedor')->
        with('ok', 'Proovedor guardado correctamente');
    }

    // Opcion3 Añadir Categorias 
    public function anadircategoria(){
        $categorias=Categoria::orderBy('nombre')->get();
        return view('productos.anadircategoria',compact('categorias'));
    }

     // Opcion3_1 Guardar categorias
    public function catego(Request $request){
        $data = $request->validate([
            'nombre' => 'required|min:3'
        ]);
        Categoria::create($data);
        return redirect()->route('productos.anadircategoria')->
        with('ok', 'Categoria guardado correctamente');
    }
   
    //Opcion4: Entrada de datos 
    public function creacion(){
        $categorias=Categoria::orderBy('nombre')->get();
        return view('productos.creacion',compact('categorias'));
    }

    //Opcion5: Guardar datos formulario
    public function tienda(Request $request){
       $data = $request->validate([
         'descripcion' => 'required|min:3',
         'stock' => 'required|integer|min:0',
         'precio' => 'required|numeric|min:0',
         'categoria_id' => 'required|exists:categorias,id',
         'proovedor_id' => 'required|exists:proovedor_id',
        ]);
        Productos::create($data);
        return redirect()->route('productos.index')->
        with('ok', 'Producto guardado correctamente');
    }       

    //Opcion3 listado general
    public function index(){
        $productos=Productos::with('categoria')->orderBy('id')->get();
        return view('productos.index',compact('productos'));
    }

    // Opcion4: Listado filtro
    public function filtroForm(){
      return view('productos.filtro');
    }

   // Opcion4: resultados filtro 
    public function filterResults(Request $request){
      $request->validate([
         'criterion' => 'required|in:stock_bajo,stock_alto,precio_alto,precio_bajo',
      ]);

      $q = Productos::with('categoria');

      if ($request->criterion === 'stock_bajo') {
           $q->where('stock', '<=', 5);
      }elseif ($request->criterion === 'stock_alto') {
           $q->where('stock', '>=', 20);
      }elseif ($request->criterion === 'precio_alto') {
           $q->where('precio', '>=', 900);
      }elseif ($request->criterion === 'precio_bajo') { 
           $q->where('precio', '<=', 50);
      }
      $productos = $q->orderBy('id')->get();
      return view('productos.index', compact('productos'));
    }

// OPCION5: pantalla “gestión” (elige y accede a editar/borrar)
    public function manage(){
        $productos = Productos::with('categoria')->orderBy('id')->get();
        return view('productos.manage', compact('productos'));
    }
    public function edit(Productos $productos){
        $categorias = Categoria::orderBy('nombre')->get();
        return view('productos.edit', compact('productos', 'categorias'));
        $proovedores = Proovedores::orderBy('nombre')->get();
        return view('productos.edit', compact('productos', 'proovedores'));
    }

    public function update(Request $request, Productos $productos){
        $data = $request->validate([
          'descripcion' => 'required|min:3',
          'stock' => 'required|integer|min:0',
          'precio' => 'required|numeric|min:0',
          'categoria_id' => 'required|exists:categorias,id',
          'proovedor_id' => 'required|exists:categorias,id',
        ]);
        $productos->update($data);
        return redirect()->route('productos.manage')->
        with('ok', 'Producto actualizado');
    }
    public function destroy(Productos $productos){
        $productos->delete();
        return redirect()->route('productos.manage')->
        with('ok', 'Producto borrado');
    }
}
