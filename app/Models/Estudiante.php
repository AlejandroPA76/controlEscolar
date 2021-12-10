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

    public function tutors(){
        return $this->belongsTo(Tutor::class);
    }
}
