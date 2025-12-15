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
        Schema::create('delegaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->constrained('regiones');
            $table->foreignId('nivel_id')->constrained('niveles');

            $table->enum('tipo', ['ACTIVO', 'JUBILADO']);  // Comité activo / jubilado
            $table->string('numero');                      // 59
            $table->string('clave')->unique();             // D-II-59

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
        Schema::dropIfExists('delegaciones');
    }
};
