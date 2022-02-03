<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaGrupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'ciclo_id',
        'grupo_id',
    ];

    
    

    
    public function estudiantes(){
        return $this->hasMany(Estudiante::class);
    }


    public function ciclo(){
        return $this->hasMany(Estudiante::class);
    }

    public function grupo(){
        return $this->hasMany(Grupo::class);
    }
    
    
    

}
