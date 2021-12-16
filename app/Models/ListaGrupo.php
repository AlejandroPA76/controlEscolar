<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaGrupo extends Model
{
    use HasFactory;

    public function docentes(){
        return $this->hasMany(Docente::class);
    }
    
    public function estudiantes(){
        return $this->hasMany(Estudiante::class);
    }

    public function nivel(){
        return $this->hasMany(Nivel::class);
    }

    public function ciclo(){
        return $this->hasMany(Estudiante::class);
    }

    public function grupo(){
        return $this->hasMany(Grupo::class);
    }
    

}
