<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TutorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'apellido_p'=>'required', 'min:3', 'max:20',
            'apellido_m'=>'required', 'min:3', 'max:20',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            
            'nombrealumno'=>'required|min:3|max:30',
            'apellido_p_a'=>'required', 'min:3', 'max:20',
            'apellido_m_a'=>'required', 'min:3', 'max:20',
            'matricula'=>'required|unique:estudiantes',


        ];
    }

    public function messages()
    {
        return [
        'apellido_p.required' => 'El primer apellido es requerido',
        'apellido_m.required' => 'El segundo apellido es requerido',
        'apellido_m_a.required' => 'El segundo apellido es requerido',
        'apellido_p_a.required' => 'El segundo apellido es requerido',
        'email.required' => 'El usuario es necesario',
        'password.required' => 'Crea una contraseña',
        'matricula.required' => 'La matricula es requerido'
        ];
    }


}
