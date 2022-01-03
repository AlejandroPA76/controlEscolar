<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
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
            //'nombrealumno'=>'required|min:3|max:30',
            //'matricula'=>'required|unique:estudiantes',
            //'apellido_p_a'=>'required', 'min:3', 'max:20',
            //'apellido_m_a'=>'required', 'min:3', 'max:20',
        ];
    }

    public function messages()
    {
        return [
        'apellido_p_a.required' => 'El primer apellido es requerido',
        'apellido_m_a.required' => 'El segundo apellido es requerido',
        // 'matricula.required' => 'La matricula ya esta en uso'
        ];
    }
}
