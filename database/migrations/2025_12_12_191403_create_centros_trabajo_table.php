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
        Schema::create('centros_trabajo', function (Blueprint $table) {
            $table->id();
            $table->string('clave')->unique();   // C.T. 01
            $table->foreignId('region_id')->constrained('regiones');
            $table->foreignId('nivel_id')->constrained('niveles');    
            
            $table->foreignId('nomenclatura_id')->constrained('nomenclaturas');

            // Datos completos (para PDFs)
            $table->string('sede')->nullable();            
            $table->string('direccion')->nullable();       
            $table->string('cp')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('estado')->nullable();

            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centros_trabajo');
    }
};
