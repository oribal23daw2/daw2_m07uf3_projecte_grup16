<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'DNI';
    
    protected $casts = [
        'DNI' => 'string'
    ];

    protected $fillable = [
        'DNI', 'Noms', 'Edat', 'Telèfon', 'Adreça',
        'Ciutat', 'País', 'Email', 'Número_permís_conducció',
        'Punts_permís_conducció', 'Tipus_targeta', 'Número_targeta'
    ];
}