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
        Schema::create('representantes', function (Blueprint $table) {
            $table->id();

            // Persona que ocupa el cargo
            $table->foreignId('persona_id')->constrained('personas');

            // Relacion sindical
            $table->foreignId('delegacion_id')->constrained('delegaciones');
            $table->foreignId('centro_trabajo_id')->constrained('centros_trabajo');

            // Cargo Sindical (Carteras)
            $table->foreignId('cargo_id')->constrained('cargos');

            $table->enum('estatus',['ACTIVO','JUBILADO'])->default('ACTIVO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representantes');
    }
};
