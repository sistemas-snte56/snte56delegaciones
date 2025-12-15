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
        Schema::create('nomenclaturas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();   // D-I, D-II, D-III, D-IV, C.T.
            $table->string('descripcion')->nullable();
            $table->enum('tipo', ['ACTIVO', 'JUBILADO', 'CT']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomenclaturas');
    }
};
