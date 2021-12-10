<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use App\Models\Estudiante;

class Tutor extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'nombre',
        // 'usuario',
        // 'contraseña',
        'apellido_p',
        'apellido_m',
        'user_id',
    ];
    
    public function guardName(){
        return "web";
    }

    public function user(){
        return $this->hasOne(User::class);
    }

    public function estudiante(){
        return $this->hasMany(Estudiante::class);
    } 
}
