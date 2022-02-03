<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'observacion',
        'estado',
        'docente_id',
        'estudiante_id',
    ];

    // relacion polimirfica

    public function docentes(){
        return $this->hasMany(Docente::class);
    }

    public function estudiantes(){
        return $this->hasMany(Estudiante::class);
    }
}
