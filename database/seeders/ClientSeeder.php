<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $llista_clients = [
            [
                'DNI' => '12345678A',
                'Noms' => 'Client1',
                'Edat' => 30,
                'Telèfon' => '123456789',
                'Adreça' => 'Carrer Major, 123', 
                'Ciutat' => 'Barcelona',
                'País' => 'Espanya',
                'Email' => 'client1@example.com',
                'Número_permís_conducció' => 'ABC123',
                'Punts_permís_conducció' => 10,
                'Tipus_targeta' => 'Dèbit',
                'Número_targeta' => '1234567890123456',
            ],
            [
                'DNI' => '87654321B',
                'Noms' => 'Client2',
                'Edat' => 35,
                'Telèfon' => '987654321',
                'Adreça' => 'Avinguda Diagonal, 456',
                'Ciutat' => 'Madrid',
                'País' => 'Espanya',
                'Email' => 'client2@example.com',
                'Número_permís_conducció' => 'XYZ789',
                'Punts_permís_conducció' => 8,
                'Tipus_targeta' => 'Crèdit',
                'Número_targeta' => '9876543210987654',
            ],
            [
                'DNI' => 'C',
                'Noms' => 'Client2',
                'Edat' => 35,
                'Telèfon' => '987654321',
                'Adreça' => 'Avinguda Diagonal, 456',
                'Ciutat' => 'Madrid',
                'País' => 'Espanya',
                'Email' => 'client2@example.com',
                'Número_permís_conducció' => 'XYZ789',
                'Punts_permís_conducció' => 8,
                'Tipus_targeta' => 'Crèdit',
                'Número_targeta' => '9876543210987654',
            ],
        ];

        DB::table('clients')->insert($llista_clients);
    }
}
