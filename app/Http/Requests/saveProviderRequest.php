<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveProviderRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
      return [
        'provider_name' => 'required|string|max:70|unique:providers',
        'nit' => 'required|alpha_dash|unique:providers',
        'phone' => 'required|numeric',
        'address' => 'nullable|string|max:70',
        'contact_name' => 'nullable|string|max:45',
        'contact_last_name' => 'nullable|string|max:45'
      ];
    }

    public function messages()
    {
      return [
        'provider_name.required' => 'EL campo Nombre del Proveedor es obligatorio.',
        'provider_name.max' => 'El campo Nombre del Provedor debe contener máximo 70 caracteres.',
        'provider_name.unique' => 'El Provedor ya existe.',
        'nit.required' => 'El campo Nit es obligatorio.',
        'nit.alpha_dash' => 'El campo de Nit solo debe contener numeros y un gion.',
        'nit.unique' => 'El Nit ya existe.',
        'phone.required' => 'El campo Teléfono es obligarotio.',
        'phone.numeric' => 'El campo Teléfono debe ser numerico.',
        'address.max' => 'El campo Dirección debe contenter máximo 70 caracteres.',
        'contact_name.max' => 'el campo Nombre Contacto debe contener máximo 45 caracteres',
        'contact_last_name.max' => 'El campo Apellido Contacto debe contener máximo 45 caracteres'
      ];
    }
}
