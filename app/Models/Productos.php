<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Proovedores;

class Productos extends Model
{
    protected $fillable =['descripcion','stock','precio','categoria_id','proovedor_id'];
    public function categoria()
    {
      return $this->belongsTo(Categoria::class);
    }
    public function proovedor()
    {
      return $this->belongsTo(Proovedores::class);
    }
}
