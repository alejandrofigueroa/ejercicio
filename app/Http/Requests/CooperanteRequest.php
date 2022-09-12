<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CooperanteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre_cooperante' => ['required', 'string', 'unique:cooperantes'],
            'email_cooperante' => ['required', 'email'],
            'direccion_cooperante' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'nombre_cooperante.required' => 'El nombre es requerido',
            'nombre_cooperante.unique' => 'El nombre del cooperante debe de ser distintivo',
            'email_cooperante.required' => 'El correo eléctronico es requerido',
            'email_cooperante.email' => 'No es el formato correcto para un correo eléctronico (email@email.com)',
            'direccion_cooperante.required' => 'La fecha de asignación es requerida'
        ];
    }
}
