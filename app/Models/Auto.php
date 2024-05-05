<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;

    protected $primaryKey = 'Matricula_auto'; // Cambiamos la clave primaria a 'Matricula_auto'

    protected $fillable = [
        'Matricula_auto', 'Número_de_bastidor', 'Marca', 'Model', 'Color', // Ajustamos los nombres de los campos
        'Nombre_de_places', 'Nombre_de_portes', 'Grandària_del_maleter', 
        'Tipus_de_combustible'
    ];
}
