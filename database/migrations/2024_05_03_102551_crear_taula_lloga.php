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
        Schema::create('lloga', function (Blueprint $table) {
            $table->string('DNI', 9);
            $table->foreign('DNI')->references('DNI')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Matricula_auto');
            $table->foreign('Matricula_auto')->references('Matricula_auto')->on('autos')->onDelete('cascade')->onUpdate('cascade');
            $table->date('Data_del_préstec');
            $table->date('Data_de_devolució');
            $table->string('Lloc_de_devolució');
            $table->decimal('Preu_per_dia');
            $table->boolean('Préstec_amb_retorn_de_dipòsit_ple');
            $table->enum('Tipus_d_assegurança', ['Franquícia_fins_a_1000_Euros', 'Franquíca_fins_500_Euros', 'Sense_franquícia']);
            $table->timestamps();

            // Definición de primary key compuesta
            $table->primary(['DNI', 'Matricula_auto']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lloga');
    }
};
