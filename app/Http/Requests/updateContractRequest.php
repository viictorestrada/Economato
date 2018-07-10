<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateContractRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
          'provider_id' => 'required',
          'contract_number' => 'required|integer|unique:contracts', Rule::unique('contracts')->ignore($this->id, 'id'),
          'contract_price' =>'required|decimal',
          'start_date' => 'required|date',
          'finish_date' => 'required|date',
          'products_id' => 'required',
          'quantity' => 'required|decimal|min:1',
          'unit_price' => 'required|decimal|min:1',
          'taxes_id' => 'required',
          'total_with_tax' => 'required|decimal|min:1',
          'tax_value' => 'required|decimal|min:1',
          'total' => 'required|decimal|min:1'
        ];
    }

    public function messages()
    {
      return [
        'provide_id.required' => 'El campo Proveedor es obligatorio.',
        'contract_number.unique' => 'El Número de Contrato ya eiste.',
        'contract_number.required' => 'El campo Número de Contrato es obligatorio.',
        'contract_number.integer' => 'El campo Número de Contrato debe ser numerico.',
        'contract_price.required' => 'El campo Valor Contrato es obligatorio.',
        'contract_price.decimal' => 'El campo Valor Contrato debe ser numérico.',
        'start_date.required' => 'El campo Fecha de Inicio es obligatorio.',
        'finish_date.required' => 'El campo Fecha de Finalización es obligatorio.',
        'product_id.required' => 'El campo Producto es obligatorio.',
        'quantity.required' => 'El campo Cantidad es obligatorio.',
        'quantity.decimal' => 'El campo Cantidad debe ser numerico.',
        'quantity.min' => 'El campo Cantidad debe tener un valor igual o mayor a 1.',
        'unit_price.required' => 'El campo Precio es obligatorio.',
        'unit_price.decimal' => 'El campo Precio debe ser numerico.',
        'unit_price.min' => 'El campo Precio debe tener un valor igual o mayor a 1.',
        'taxes_id' => 'El campo IVA es obligatorio.',
        'total_with_tax.required' => 'El campo Precio con IVA es obligatorio.',
        'total_with_tax.decimal' => 'El campo Precio con IVA debe ser numerico.',
        'total_with_tax.min' => 'El campo Precio con IVA debe ser mínimo 1.',
        'tax_value.required' => 'El campo valor IVA es obligatorio.',
        'tax_value.decimal' => 'El campo valor IVA debe ser numerico.',
        'tax_value.min' => 'El campo valor IVA debe tener un valor igual o mayor a 1.',
        'total.required' => 'El campo valor Total es obligatorio.',
        'total.decimal' => 'El campo valor Total debe ser numerico.',
        'total.min' => 'El campo valor Total debe tener un valor igual o mayor a 1.'
      ];
    }
}
