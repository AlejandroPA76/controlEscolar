<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tutor;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido_p',
        'foto',
        'apellido_m',
        'matricula',
        'tutor_id',
    ];

    public function tutor(){
        return $this->belongsTo(Tutor::class);
    }

    
    public function observaciones(){
        return $this->belongsTo(Observacion::class, );
    }

    public function listaGrupo(){
        return $this->belongsTo(ListaGrupo::class);
    }
    
    public function foto(){
        return $this->hasOne(Imagen::class);
    }
}
