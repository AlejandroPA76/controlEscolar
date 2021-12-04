<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Tutor extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'nombre',
        // 'usuario',
        // 'contraseña',
        'apellido_p',
        'apellido_m',
    ];
    
    public function guardName(){
        return "web";
    }
}
