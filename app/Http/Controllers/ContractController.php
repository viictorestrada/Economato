<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Provider;
use App\Models\Product;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Http\Requests\saveContractRequest;
use Illuminate\Validation\Rule;
use DataTables;

class ContractController extends Controller
{

    public function index()
    {
      $contract = Contract::all();
      return view('contracts.index', compact('contract'));
    }

    public function create()
    {
      $providers = Provider::pluck('provider_name', 'id');
      $products = Product::pluck('product_name', 'id');
      $taxes = Tax::pluck('tax', 'id');
      return view('contracts.create', compact('providers', 'products', 'taxes'));
    }


    public function store(saveContractRequest $request)
    {
      $this->validate($request, $rules, $messages);
      Contract::create($request->all());
      return redirect('contracts')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit($id)
    {
      $providers = Provider::pluck('provider_name', 'id');
      $contract = Contract::find($id);
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


    public function update(Request $request, $id)
    {

      $rules = [
        'provider_id' => 'required',
        'contract_number' => 'required|integer', Rule::unique('contracts')->ignore($this->id, 'id'),
        'contract_price' =>'required|integer',
        'contract_date' => 'required|date'
      ];

      $messages = [
        'provider_id.required' => 'El campo Proveedor es obligatorio.',
        'contract_number.required' => 'El campo Número de Contrato es obligatorio.',
        'contract_number.integer' => 'El campo Número de Contrato debe ser numerico.',
        'contract_price.required' => 'El campo Monto es obligatorio.',
        'contract_price.ingeter' => 'El campo Monto debe ser numérico.',
        'contract_date.required' => 'El campo Fecha es obligatorio.'
      ];


      $this->validate($request, $rules, $messages);
      $contract = Complex::find($id);
      $contract->update($request->all());
      return redirect('contracts')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
