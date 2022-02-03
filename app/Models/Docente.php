<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido_p',
        'apellido_m',
        'matricula',
        'user_id',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
    
    public function observaciones(){
        return $this->belongsTo(Observacion::class);
    }

    public function Grupo(){
        return $this->belongsTo(Grupo::class);
    }
    
    
}
