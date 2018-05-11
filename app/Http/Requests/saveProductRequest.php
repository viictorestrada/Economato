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
        'product_code' => 'required|integer|min:0|unique:products',
        'id_product_type' => 'required',
        'product_name' => 'required|string|max:100|unique:products',
        'id_measure_unit' => 'required',
        'presentation' => 'nullable|string|max:45',
        'quantity' => 'required|integer|min:1',
        'due_date' => 'after:date',
        'unit_price' => 'nullable|numeric|min:0',
        'stock' => 'required|integer|min:0'
      ];
    }

    public function messages()
    {
      return [
        'product_code.required' => 'El campo Código Producto es obligatorio',
        'product_code.integer' => 'El campo Código Producto debe ser un número entero',
        'product_code.min' => 'El campo Código Producto debe ser un número igual o mayor a 0',
        'product_code.unique' => 'El código del producto ya existe',
        'id_product_type.required' => 'El campo Tipo Producto es obligatorio',
        'product_name.required' => 'El campo Nombre Producto es obligatorio',
        'product_name.max' => 'El campo Nombre Producto debe contener máximo 100 caracteres',
        'product_name.unique' => 'El nombre del producto ya existe',
        'id_measure_unit.required' => 'El campo Unidad de Medida es obligatorio',
        'presentation.max' => 'El campo Presentación debe contener máximo 45 caracteres',
        'quantity.required' => 'El campo Cantidad es obligatorio',
        'quantity.integer' => 'El campo Cantidad debe ser un número entero',
        'quantity.min' => 'El campo Cantidad debe ser un numero igual o mayor a 1',
        'due_date.date' => 'El campo Fecha de vencimiento no corresponde a una fecha valida',
        'due_date.after' => 'El campo Fecha de vencimiento debe ser una fecha posterior a :date.',
        'unit_price.numeric' => 'El campo Precio Unitario debe ser numerico',
        'unit_price.min' => 'El campo Precio Unitario debe ser igual o mayor a 0',
        'stock.required' => 'El campo Stock es obligatorio',
        'stock.integer' => 'EL campo Stock debe ser un número entero',
        'stock.min' => 'El campo stock no puede ser menor a 0'
      ];
    }
}
