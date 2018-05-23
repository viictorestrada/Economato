<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateFileRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
          'program_id' => 'required',
          'characterization_id' => 'required',
          'file_number' => 'required|string|max:45', Rule::unique('files')->ignore($this->id, 'id'),
          'file_route' => 'required|max:45',
          'apprentices' => 'required|integer',
        ];
    }

    public function messages()
    {
      return [
        'program_id.required' => 'El campo Programa es obligatorio',
        'characterization_id.required' => 'El campo Caracterización es obligatorio',
        'file_number.required' => 'El campo Número de Ficha es obligatorio',
        'file_number.max' => 'El campo Número de Ficha debe contener máximo 45 caracteres',
        'file_route.required' => 'El campo Ruta es obligatorio',
        'file_route.max' => 'El campo Ruta debe contener máximo 45 caracteres',
        'apprentices.required' => 'El campo Aprendices es obligatorio',
        'apprentices.integer' => 'El campo Aprendices debe ser un número entero',
      ];
    }
}
