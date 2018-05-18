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
      $this->validate($request, [
        'product_type_name' => 'required|string|max:45|unique:product_type_name',
        'description' => 'required|string'
      ]);
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
      $this->validate($request, [
        'product_type_name' => 'required|string|max:80|unique:product_type_name', Rule::unique('product_type')->ignore($this->id, 'id'),
        'description' => 'required|string',
      ]);
      $productTypes = ProductType::find($id);
      $productTypes->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
