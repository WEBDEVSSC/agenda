<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedInteger('category')->nullable()->after('end'); // Campo numérico para categoría
            $table->string('category_label')->nullable()->after('category'); // Campo de texto para la etiqueta de categoría
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->dropColumn('category_label');
        });
    }
};
