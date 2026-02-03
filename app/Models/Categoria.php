<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Productos;

class Categoria extends Model
{
   protected $fillable=['nombre'];
   public function productos(){
       return $this->hasMany(Productos::class);
   }
}
