<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoRequest extends FormRequest
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
            'nombre_tutor'=>'required|min:3|max:30',
            'apellido_p_tutor'=>'required', 'min:3', 'max:20',
            'apellido_m_tutor'=>'required', 'min:3', 'max:20',
            'email'=>'required|email|unique:users',
            'cantidad_pagada'=>'required',
            'motivo'=>'required', 'min:3', 'max:200',
            'status'=>'required', 'min:3', 'max:20',
        ];
    }
}
