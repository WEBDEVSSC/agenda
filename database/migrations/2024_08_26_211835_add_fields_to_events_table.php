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
        Schema::table('events', function (Blueprint $table) {
            // Campos a agregar
            $table->string('organize')->nullable(); // Campo de organizador
            $table->string('authority_ss')->nullable(); // Campo de autoridad SS
            $table->string('authority_ext')->nullable(); // Campo de autoridad externa
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Eliminar los campos agregados en caso de rollback
            $table->dropColumn([
                'organize', 
                'authority_ss', 
                'authority_ext'
            ]);
        });
    }
    
};
