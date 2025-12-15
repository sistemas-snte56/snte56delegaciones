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
            $table->string('clave');   // C.T. 01
            $table->foreignId('region_id')->constrained('regiones');
            $table->foreignId('nivel_id')->constrained('niveles');            
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
