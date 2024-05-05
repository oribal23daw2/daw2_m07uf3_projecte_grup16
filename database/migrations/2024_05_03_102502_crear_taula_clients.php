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
        Schema::create('clients', function (Blueprint $table) {
            $table->string('DNI', 9)->primary();
            $table->string('Noms');
            $table->integer('Edat');
            $table->string('Telèfon');
            $table->string('Adreça');
            $table->string('Ciutat');
            $table->string('País');
            $table->string('Email');
            $table->string('Número_permís_conducció');
            $table->integer('Punts_permís_conducció');
            $table->enum('Tipus_targeta', ['Dèbit', 'Crèdit']);
            $table->string('Número_targeta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
