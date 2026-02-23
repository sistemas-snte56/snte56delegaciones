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
        Schema::table('representantes', function (Blueprint $table) {
            // Agrega deleted_at después de la columna 'updated_at'
            $table->softDeletes()->after('updated_at');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('representantes', function (Blueprint $table) {
            // Elimina la columna si se revierte la migración
            $table->dropSoftDeletes();            
        });
    }
};
