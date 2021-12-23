<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocenteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // retornamos true para que podamos usar las validaaciones
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required|min:3|max:30',
            'matricula'=>'required|unique:docentes',
            'apellido_p'=>'required', 'min:3', 'max:20',
            'apellido_m'=>'required', 'min:3', 'max:20',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ];
    }

    public function messages()
    {
        return [
        'apellido_p.required' => 'El primer apellido es requerido',
        'apellido_m.required' => 'El segundo apellido es requerido',
        'email.required' => 'El usuario es requerido',
        'password.required' => 'La contraseña es requerido',
        // 'matricula.required' => 'La matricula ya esta en uso'
        ];
    }
}
