<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', fn() => view('home'))->name('home');

Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');
Route::get('/productos/anadirproovedor', [ProductController::class, 'anadirproovedor'])->name('productos.anadirproovedor');
Route::post('/proovedores',[ProductController::class, 'prove'])->name('proovedores.guardar');
Route::delete('/proovedores/{productos}', [ProductController::class, 'borrarprove'])->name('productos.borrarprove');

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