<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('compras', function (BluePrint $table){
              $table->id();//id(autoinrecmental)
              $table->foreignId('proveedor_id')->constrained('proveedores')->cascadeOnDelete(); //id de proovedores
              $table->foreignId('productos_id')->constrained('productos')->cascadeOnDelete(); //id de proovedores
              $table->integer('cantidad')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('compras');
    }
};
