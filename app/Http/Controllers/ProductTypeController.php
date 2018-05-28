<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

class ProductTypeController extends Controller
{

    public function store(Request $request)
    {
      $rules = [
        'product_type_name' => 'required|string|max:80|unique:product_type',
        'description' => 'required|string',
      ];

      $messages = [
        'product_type_name.required' => 'El campo Tipo de producto es obligatorio.',
        'product_type_name.max' => 'El campo Tipo de producto debe contener máximo 80 caracteres.',
        'product_type_name,unique' => 'El campo Tipo de producto ya existe.',
        'description.required' => 'El campo Descripción es obligatorio.'
      ];

      $this->validate($request, $rules, $messages);
      ProductType::create($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit(ProductType $productType)
    {
        //
    }

    public function productTypesList(Request $request)
    {
      $productTypes = ProductType::select('product_type.*')->get();
      return DataTables::of($productTypes)
      ->addColumn('action', function($id) {
        $button=" ";
        return $button.'  <a href="/product_types/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
      })->make(true);
    }


    public function update(Request $request, $id)
    {

      $rules = [
        'product_type_name' => 'required|string|max:80',                Rule::unique('product_type')->ignore($this->id, 'id'),
        'description' => 'required|string',
      ];

      $messages = [
        'product_type_name.required' => 'El campo Tipo de producto es obligatorio.',
        'product_type_name.max' => 'El campo Tipo de producto debe contener máximo 80 caracteres.',
        'description.required' => 'El campo Descripción es obligatorio.'
      ];

      $this->validate($request, $rules, $messages);
      $productTypes = ProductType::find($id);
      $productTypes->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
