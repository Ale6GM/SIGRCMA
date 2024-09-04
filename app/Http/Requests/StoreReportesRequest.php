<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fecha_inicio' => 'required',
            'clientes_id' => 'required',
            'establecimientos_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'fecha_inicio.required' => 'La fecha de Inicio es Requerida',
            'clientes_id.required' => 'El Cliente es Requerido',
            'establecimientos_id.required' => 'El Local es Requerido', 
        ];
    }
}
