<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'name'=>'required|min:3|max:30',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ];
    }

    public function messages()
    {
        return [
        'name.required' => 'El nombre es requerido',
        'email.required' => 'El usuario es necesario',
        'password.required' => 'Crea una contraseña',
        ];
    }
}
