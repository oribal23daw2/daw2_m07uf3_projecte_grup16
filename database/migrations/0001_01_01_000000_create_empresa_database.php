<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crear el usuario 'administrador'
        DB::statement("CREATE USER 'administrador'@'localhost' IDENTIFIED BY 'FjeClot24#'");

        // Crear la base de datos 'empresa' y seleccionarla
        DB::statement("CREATE DATABASE empresa");
        DB::statement("USE empresa");

        // Otorgar todos los privilegios al usuario 'administrador' en la base de datos 'empresa'
        DB::statement("GRANT ALL PRIVILEGES ON empresa.* TO 'administrador'@'localhost'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revertir los cambios
        DB::statement("DROP DATABASE IF EXISTS empresa");
        DB::statement("DROP USER 'administrador'@'localhost'");
    }
}
