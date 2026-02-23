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
        Schema::create('cargo_nomenclatura', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cargo_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('nomenclatura_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['cargo_id', 'nomenclatura_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargo_nomenclatura');
    }
};
