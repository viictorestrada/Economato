<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveProductRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
      return [
        'product_code' => 'required|min:0|unique:products|max:15',
        'id_product_type' => 'required',
        'product_name' => 'required|string|max:100|unique:products',
        'id_measure_unit' => 'required',
        'presentation_id' => 'required'
      ];
    }

    public function messages()
    {
      return [
        'product_code.required' => 'El campo Código Producto es obligatorio.',
        'product_code.min' => 'El campo Código Producto debe ser un número igual o mayor a 0.',
        'product_code.max'=>'El campo Código Producto no permite mas de 15 caracteres.',
        'product_code.unique' => 'El código del producto ya existe.',
        'id_product_type.required' => 'El campo Tipo Producto es obligatorio.',
        'product_name.required' => 'El campo Nombre Producto es obligatorio.',
        'product_name.max' => 'El campo Nombre Producto debe contener máximo 100 caracteres.',
        'product_name.unique' => 'El nombre del producto ya existe.',
        'id_measure_unit.required' => 'El campo Unidad de Medida es obligatorio.',
        'presentation_id.required' => 'El campo Presentación es obligatorio.'
      ];
    }
}
