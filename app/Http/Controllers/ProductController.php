<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Compras;
use App\Models\Proveedores;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductController extends Controller
{ 
    // Opcion2 Añadir Proovedor
    public function anadirproveedor(){
        $proveedores=Proveedores::orderBy('nombre')->get();
        return view('productos.anadirproveedor',compact('proveedores'));
    }

     // Opcion2_1 Guardar Proovedor
    public function prove(Request $request){
        $data = $request->validate([
            'nombre' => 'required|min:3'
        ]);
        Proveedores::create($data);
        return redirect()->route('productos.anadirproveedor')->
        with('ok', 'Proveedor guardado correctamente');
    }

    //Opcion 2_2 Borrar proovedor

 #   public function borrarprove(Proovedores $proovedores){
 #      $proovedores->delete();
  #      return redirect()->route('productos.anadirproovedor')->
  #      with('ok', 'Producto borrado');
 #   }

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
        $proveedores=Proveedores::orderBy('nombre')->get();
        return view('productos.creacion',compact('categorias','proveedores'));
        
    }

    //Opcion4_1: Guardar datos formulario
    public function tienda(Request $request){
       $data = $request->validate([
         'descripcion' => 'required|min:3',
         'stock' => 'required|integer|min:0',
         'precio' => 'required|numeric|min:0',
         'categoria_id' => 'required|exists:categorias,id',
         'proveedor_id' => 'required|exists:proveedores,id',
        ]);
        Productos::create($data);
        return redirect()->route('productos.index')->
        with('ok', 'Producto guardado correctamente');
    }       

    //Opcion5 listado general
    public function index(){
        $productos=Productos::with('categoria','proveedor')->orderBy('id')->get();
        return view('productos.index',compact('productos'));
    }

    // Opcion4: Listado filtro
    public function filtroForm(){
      return view('productos.filtro');
    }

   // Opcion4: resultados filtro 
    public function filterResults(Request $request){
      $request->validate([
         'criterion' => 'required|in:stock_bajo,stock_alto,precio_alto,precio_bajo']);

      $q = Productos::with('categoria');

      if ($request->criterion === 'stock_bajo') {
           $q->where('stock', '<=', 4);
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
        $productos = Productos::with('categoria','proveedor')->orderBy('id')->get();
        return view('productos.manage', compact('productos'));
    }
    public function edit(Productos $productos){
        $categorias = Categoria::orderBy('nombre')->get();
        $proveedores = Proveedores::orderBy('nombre')->get();
        return view('productos.edit', compact('productos', 'categorias','proveedores'));
    }

    public function update(Request $request, Productos $productos){
        $data = $request->validate([
          'descripcion' => 'required|min:3',
          'stock' => 'required|integer|min:0',
          'precio' => 'required|numeric|min:0',
          'categoria_id' => 'required|exists:categorias,id',
          'proveedor_id' => 'required|exists:proveedores,id',
        ]);
        $productos->update($data);
        return redirect()->route('productos.manage')->
        with('ok', 'Producto actualizado');
    }
    public function destroy(Productos $productos){
        $productos->delete();
        return redirect()->route('productos.manage')->
        with('ok', 'Producto boDerapurrado');
    }

    // OPCION 6: compra del producto

    public function realizarcompra(){
        $proveedores=Proveedores::orderBy('nombre')->get();
        $productos=Productos::orderBy('descripcion')->get();
        return view('productos.realizarcompra',compact('proveedores','productos'));
        
    }

    //Opcion 6_1: Mostrar compra
    public function compraresultado(Request $request){
        $data = $request->validate([
            'productos_id'=>'required|exists:productos,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'cantidad' => 'required|integer|min:0',
        ]);
        Compras::create($data);
        return redirect()->route('productos.realizarcompra')->
        with('ok', 'Compra realizada');
    }

}
 


    
   

