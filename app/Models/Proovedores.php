<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Productos;

class Proovedores extends Model
{
   protected $fillable=['nombre'];
   public function productos(){
       return $this->hasMany(Productos::class);
   }
   public function categorias(){
       return $this->hasMany(Categoria::class);
   }
}
