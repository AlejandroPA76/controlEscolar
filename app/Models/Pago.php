<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;


    public function scopebuscarPagoMes($query, $fecha){
        return $query->where('created_at','like','%' . $fecha . '%');


    }

    protected $fillable = [
            'nombre_tutor',
            'apellido_p_tutor',
            'apellido_m_tutor',
            'email',
            'id_tutor',
            'num_operacion',
            'motivo',
            'status',
            'cantidad_pagada',
    ];
    
    
      
}
