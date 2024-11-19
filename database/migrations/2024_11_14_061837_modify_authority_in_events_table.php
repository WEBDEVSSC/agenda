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
            //
            $table->text('authority_ss')->change();
            $table->text('authority_ext')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            //
            $table->string('authority_ss', 255)->change(); // Cambia esto si deseas revertir
            $table->string('authority_ext', 255)->change(); // Cambia esto si deseas revertir
        });
    }
};
