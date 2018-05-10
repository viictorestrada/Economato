<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductTypeController extends Controller
{

    public function store(Request $request)
    {
      $this->validate($request, [
        'product_type_name' => 'required|string|max:45|unique:product_type_name',
        'description' => 'required|text'
      ]);
      ProductType::create($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit(ProductType $productType)
    {
        //
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'product_type_name' => 'required|string|max:80|unique:product_type_name', Rule::unique('product_type')->ignore($this->id, 'id'),
        'description' => 'required|text',
      ]);
      $measure = ProductType::find($id);
      $measure->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
