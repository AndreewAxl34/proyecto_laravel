<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Proovedores;
use App\Models\Productos;

class Compras extends Model
{
    protected $fillable =['producto_id','proveedor_id','cantidad'];
    public function productos(){
       return $this->hasMany(Productos::class);
   }
    public function proveedor()
    {
      return $this->belongsTo(Proveedores::class);
    }
}
