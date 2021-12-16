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
        'apellido_m',
        'matricula',
        'tutor_id',
    ];

    public function tutor(){
        return $this->belongsTo(Tutor::class);
    }

    // relacion polimrfica de uno a muchos
    public function observaciones(){
        return $this->morphMany(Observacion::class, 'observable');
    }

    public function listaGrupo(){
        return $this->belongsTo(ListaGrupo::class);
    }
}
