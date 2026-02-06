<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Compras;
use App\Models\Productos;

class Proveedores extends Model
{
   protected $fillable=['nombre'];
   public function productos(){
       return $this->hasMany(Productos::class);
   }
   public function compra(){
       return $this->hasMany(Compras::class);
   }
}
