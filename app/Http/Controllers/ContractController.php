<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Provider;
use App\Models\Product;
use App\Models\Budget;
use App\Models\ProductsHasController;
use App\Models\Tax;
use App\Models\ProductsHasContracts;
use App\Models\ContractsHasBudget;
use Illuminate\Http\Request;
use App\Http\Requests\saveContractRequest;
use DataTables;
use DB;

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


    public function store(Request $request)
    {

      $file = $request->file('Contracts_url');
       $nombre = $file->getClientOriginalName();
       \Storage::disk('local')->put($request['contract_number'].$nombre,  \File::get($file));

      $input=$request->all();
      if (count($input)<7) {
        return redirect('contracts/create')->with([swal()->autoclose(1500)->error('Registro Fallido', 'No se han agregado productos!')]);
      }
      $contract=Contract::create(['provider_id' =>$input['provider_id'],
      'contract_number'=>$input['contract_number'],
      'contract_price'=>$input["contract_price"],
      'start_date'=>$input['start_date'],
      'finish_date'=>$input["finish_date"],
      'Contracts_url'=> $input['contract_number'].$nombre
      ]);


        $idContract=$contract->id;

      DB::transaction(function() use($input,$idContract){
          foreach($input['products_id'] as $key => $value){
            $productStatusValidation=ProductsHasContracts::where('products_id',$input['products_id'][$key])->where('status',1)->get();
            if($productStatusValidation->isEmpty()){
            ProductsHasContracts::create(['products_id'=>$input['products_id'][$key],
            'contracts_id'=>$idContract,
            'quantity'=>$input['quantity'][$key],
            'unit_price'=>$input['unit_price'][$key],
            'taxes_id'=>$input['taxes_id'][$key],
            'total_with_tax'=>$input['total_with_tax'][$key],
            'tax_value'=>$input['tax_value'][$key],
            'total'=>$input['total'][$key],
            'quantity_agreed'=>$input['quantity'][$key]]);
          }
        }
          $budget=Budget::where('status',1)->first();
          ContractsHasBudget::create([
            'contract_id'=>$idContract,
            'budget_id'=>$budget->id
          ]);

    });
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
      $contract = Contract::select('contracts.*','providers.provider_name')
      ->join('providers','providers.id','contracts.provider_id')->get();
      return DataTables::of($contract)
      ->addColumn('action', function($dataContract) {
        $button=" ";
        if($dataContract->Contracts_Url==""){
          $dataContract->Contracts_Url='vacio';
        }
           $button ='<a href='.route('downloadFile',$dataContract->Contracts_Url).' class="btn btn-md btn-outline-info" title="Descargar contrato."><i class="fas fa-download"></i></a>';
        return $button;
      })
      ->editColumn('contract_price', function($dataContract){
          return number_format($dataContract->contract_price);
      })->make(true);
    }


    public function update(updateContractRequest $request, $id)
    {
      Complex::findOrFail($id)->update($request->all());
      return redirect('contracts')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

    public function downloadFile($data){
      if($data=="vacio"){
        return redirect('contracts')->with([swal()->autoclose(2500)->info('El contrato no tiene archivo de soporte.')]);
      }else{
      $public_path=storage_path();
      $file=$public_path.'/uploads/'.$data;
      if(\Storage::disk('local')->exists($data)){
        return response()->download($file);
      }else{
       abort(404);
    }
  }
  }

}
