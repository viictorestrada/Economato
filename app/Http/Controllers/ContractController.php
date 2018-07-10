<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Provider;
use App\Models\Product;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Http\Requests\saveContractRequest;
use DataTables;

class ContractController extends Controller
{

    public function index()
    {
      return view('contracts.index');
    }

    public function create()
    {
      $providers = Provider::pluck('provider_name', 'id');
      $products = Product::pluck('product_name', 'id');
      $taxes = Tax::pluck('tax', 'id');
      return view('contracts.create', compact('providers', 'products', 'taxes'));
    }

    public function getMeasureUnit(Request $request, $id)
    {
      if($request->ajax()){
        $measureUnit = Product::measureUnit($id);
        return response()->json($measureUnit);
      }
    }


    public function store(saveContractRequest $request)
    {
      Contract::create($request->all());
      return redirect('contracts')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit($id)
    {
      $providers = Provider::pluck('provider_name', 'id');
      $contract = Contract::findOrFail($id);
      return view('contracts.edit', compact('providers', 'contract'));
    }

    public function contractsList(Request $request)
    {
      $contract = Contract::select('contracts.*','providers.provider_name')->join('providers', 'providers.id', '=', 'contracts.provider_id')->get();;
      return DataTables::of($contract)
      ->addColumn('action', function($id) {
        $button=" ";
        return $button.'  <a href="/contracts/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
      })->make(true);
    }


    public function update(updateContractRequest $request, $id)
    {
      Complex::findOrFail($id)->update($request->all());
      return redirect('contracts')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
