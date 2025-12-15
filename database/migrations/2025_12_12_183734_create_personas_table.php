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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->enum('titulo',['PROF.','PROFA.','C.']);
            $table->string('nombre');
            $table->string('apaterno');
            $table->string('amaterno');
            $table->enum('genero',['M','F','O'])->nullable();

            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('direccion')->nullable();
            $table->string('cp')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('estado')->default('VERACRUZ')->nullable();
            
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
