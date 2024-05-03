<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'Dni_client'; // Cambio de primaryKey a 'Dni_client'
    
    protected $fillable = [
        'Dni_client', 'Nom_i_cognoms', 'Edat', 'Telèfon', 'Adreça',
        'Ciutat', 'País', 'Email', 'Número_del_permís_de_conducció',
        'Punts_del_permís_de_conducció', 'Tipus_de_targeta', 'Número_de_la_targeta'
    ];
}