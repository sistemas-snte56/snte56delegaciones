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
        Schema::table('delegaciones', function (Blueprint $table) {
            $table->enum('estatus',[
                'ACTIVA',
                'INACTIVA',
                'REESTRUCTURADA',
            ])->default('ACTIVA')->after('clave');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delegaciones', function (Blueprint $table) {
            $table->dropColumn('estatus');
        });
    }
};
