<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoRequest extends FormRequest
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
            'nombre_proyecto' => ['required', 'string', 'unique:proyectos'], 
            'descripcion_proyecto' => ['required', 'string'], 
            'estado' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'nombre_proyecto.required' => 'El nombre es requerido',
            'nombre_proyecto.unique' => 'El nombre del proyecto debe de ser único',
            'descripcion_proyecto.required' => 'La descripción del proyecto es requerido',
            'estado.required' => 'El estado del proyecto es requerido'
        ];
    }
}
