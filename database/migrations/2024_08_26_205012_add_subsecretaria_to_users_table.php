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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('subsecretaria')->nullable()->after('email'); // Ajusta la posición del campo según tu necesidad
            $table->string('subsecretaria_label')->nullable(); // Ajusta la posición del campo según tu necesidad
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('subsecretaria');
            $table->dropColumn('subsecretaria_label');
        });
    }
};
