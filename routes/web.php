<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', fn() => view('home'))->name('home');

Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');
Route::get('/productos/anadirproveedor', [ProductController::class, 'anadirproveedor'])->name('productos.anadirproveedor');
Route::post('/proveedores',[ProductController::class, 'prove'])->name('proveedores.guardar');
Route::delete('/proveedores/{productos}', [ProductController::class, 'borrarprove'])->name('productos.borrarprove');

Route::get('/productos/anadircategoria', [ProductController::class, 'anadircategoria'])->name('productos.anadircategoria');
Route::post('/categorias',[ProductController::class, 'catego'])->name('categorias.guardar');

Route::get('/productos/creacion', [ProductController::class, 'creacion'])->name('productos.creacion');
Route::post('/productos', [ProductController::class, 'tienda'])->name('productos.tienda');

Route::get('/productos/filtro', [ProductController::class, 'filtroForm'])->name('productos.filtro.form');
Route::get('/productos/filtro/results', [ProductController::class, 'filterResults'])->name('productos.filtro.results');

Route::get('/productos/manage', [ProductController::class, 'manage'])->name('productos.manage');
Route::get('/productos/{productos}/edit', [ProductController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{productos}', [ProductController::class, 'update'])->name('productos.actualizar');
Route::delete('/productos/{productos}', [ProductController::class, 'destroy'])->name('productos.destruir');

Route::get('/productos/realizarcompra', [ProductController::class, 'realizarcompra'])->name('productos.realizarcompra');
Route::post('/productos/compraresultado', [ProductController::class, 'compraresultado'])->name('productos.compraresultado');