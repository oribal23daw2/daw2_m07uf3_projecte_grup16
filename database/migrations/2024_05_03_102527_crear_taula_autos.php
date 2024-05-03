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
        Schema::create('autos', function (Blueprint $table) {
            $table->string('Matricula_auto')->primary();
            $table->string('Número_de_bastidor')->nullable();
            $table->string('Marca');
            $table->string('Model');
            $table->string('Color');
            $table->integer('Nombre_de_places');
            $table->integer('Nombre_de_portes');
            $table->string('Grandària_del_maleter');
            $table->enum('Tipus_de_combustible', ['gasolina', 'diesel', 'elèctric']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
