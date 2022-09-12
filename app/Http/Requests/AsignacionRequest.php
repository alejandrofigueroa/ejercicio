<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignacionRequest extends FormRequest
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
            'cooperante_id' => ['required'],
            'proyecto_id' => ['required'], 
            'fecha_asignacion' => ['required'], //date_format:m/d/Y
            'monto' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/']
        ];
    }

    public function messages()
    {
        return [
            'monto.required' => 'El monto es requerido',
            'monto.numeric' => 'El monto debe de ser decimal o entero',
            'monto.regex' => 'No es valido este formato para el monto (#.##)',
            'fecha_asignacion.required' => 'La fecha de asignación es requerida'
        ];
    }
}
