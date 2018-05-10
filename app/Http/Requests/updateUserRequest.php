<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateUserRequest extends FormRequest
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
     * @return array
     */
     public function rules()
     {
         return [
           'rol_id' => 'required',
           'name' => 'required|string|max:45',
           'last_name' => 'required|string|max:45',
           'email' => 'required|email', Rule::unique('users')->ignore($this->id, 'id'),
           'password' => 'confirmed'
         ];
     }

     public function messages()
     {
       return [
         'rol_id.required' => 'El campo Rol es obligatorio',
         'name.required' => 'El campo Nombres es obligatorio',
         'name.max' => 'El campo Nombres debe contener máximo 45 caracteres',
         'last_name.required' => 'El campo Apellidos es obligatorio',
         'last_name.max' => 'El campo Apellidos debe contener máximo 45 caracteres',
         'email.required' => 'El campo Correo electrónico es obligatorio',
         'email.email' => 'El campo Correo electrónico debe ser una dirección de correo valida'
       ];
     }
}
