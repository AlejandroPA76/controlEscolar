<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombrealumno',
        'apellido_p_a',
        'apellido_m_a',
        'matricula_a',
    ];
}
