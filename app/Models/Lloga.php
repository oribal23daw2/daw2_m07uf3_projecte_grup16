<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lloga extends Model
{
    use HasFactory;

    protected $table = 'lloga';

    protected $primaryKey = 'id'; // Asume que 'id' es una nueva columna autoincremental

    protected $fillable = [
        'DNI', 'Matricula_auto', 'Data_del_préstec', 'Data_de_devolució',
        'Lloc_de_devolució', 'Preu_per_dia', 'Préstec_amb_retorn_de_dipòsit_ple',
        'Tipus_d_assegurança'
    ];

    protected $casts = [
        'Préstec_amb_retorn_de_dipòsit_ple' => 'boolean'
    ];

    protected $dates = [
        'Data_del_préstec', 'Data_de_devolució'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'DNI', 'DNI');
    }

    public function Auto()
    {
        return $this->belongsTo(Auto::class, 'Matricula_auto', 'Matricula_auto');
    }
}
