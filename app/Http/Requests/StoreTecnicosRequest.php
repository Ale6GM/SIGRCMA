<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTecnicosRequest extends FormRequest
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
            'nombre' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El Nombre del Tecnico es Obligatorio',
            'primer_apellido.required' => 'El Primer Apellido es Obligatorio',
            'segundo_apellido.required' => 'El Segundo Apellido es Obligatorio',
        ];
    }
}
