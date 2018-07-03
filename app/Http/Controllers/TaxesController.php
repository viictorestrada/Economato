<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use Illuminate\Validation\Rule;
use DataTables;

class TaxesController extends Controller
{


    public function store(Request $request)
    {
      $rules = [
        'tax' => 'required|max:2|unique:taxes'
      ];
      $messages = [
        'tax.required' => 'El campo de IVA es obligatorio.',
        'tax.unique' => "El campo de IVA ya existe.",
        'tax.max' => 'El campo IVA debe contener máximo 2 caracteres.'
      ];


      Tax::create($request->all());
    }


    public function edit($id)
    {
        $taxes=Tax::find($id);
        return $taxes;
    }


    public function update(Request $request, $id)
    {
        $taxes=Tax::find($id);
        $taxes->update($request->all());
        return $taxes;
    }



    public function taxesList(Request $request)
    {
      $taxes = Tax::all();
      return DataTables::of($taxes)
      ->addColumn('action', function($taxes) {
        $button=" ";
        return $button.'  <a onclick="editTaxes('. $taxes->id .')" class="btn btn-md btn-info text-light"><i class="fa fa-edit"></i></a>';
      })->make(true);
    }

}
