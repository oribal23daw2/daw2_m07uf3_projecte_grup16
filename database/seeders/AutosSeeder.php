<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $llista_autos = [
            [
                'Matricula_auto' => '1234ABC',
                'Número_de_bastidor' => '123456789012345',
                'Marca' => 'Toyota',
                'Model' => 'Corolla',
                'Color' => 'Negro',
                'Nombre_de_places' => 5,
                'Nombre_de_portes' => 4,
                'Grandària_del_maleter' => 'Grande',
                'Tipus_de_combustible' => 'Gasolina',
            ],
            [
                'Matricula_auto' => '5678XYZ',
                'Número_de_bastidor' => '987654321098765',
                'Marca' => 'Honda',
                'Model' => 'Civic',
                'Color' => 'Blanco',
                'Nombre_de_places' => 5,
                'Nombre_de_portes' => 4,
                'Grandària_del_maleter' => 'Grande',
                'Tipus_de_combustible' => 'Gasolina',
            ],
            [
                'Matricula_auto' => 'ABCD123',
                'Número_de_bastidor' => 'ABCDEF123456789',
                'Marca' => 'Ford',
                'Model' => 'Focus',
                'Color' => 'Azul',
                'Nombre_de_places' => 5,
                'Nombre_de_portes' => 4,
                'Grandària_del_maleter' => 'Grande',
                'Tipus_de_combustible' => 'Diesel',
            ],
        ];

        DB::table('autos')->insert($llista_autos);
    }
}
