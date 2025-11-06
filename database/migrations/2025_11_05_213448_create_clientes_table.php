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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre', 255);
            $table->string('apellidos', 255);
            $table->string('email', 255)->nullable();
            $table->string('telefono', 255)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('rfc', 255)->nullable();
            $table->string('licencia_conducir', 255)->default('0');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
