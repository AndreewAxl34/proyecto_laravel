<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Proveedores;

class Productos extends Model
{
    protected $fillable =['descripcion','stock','precio','categoria_id','proveedor_id'];
    public function categoria()
    {
      return $this->belongsTo(Categoria::class);
    }
    public function proveedor()
    {
      return $this->belongsTo(Proveedores::class);
    }
}
