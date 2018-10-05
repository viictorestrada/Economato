<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\saveProviderRequest;
use App\Http\Requests\updateProviderRequest;
use DataTables;

class ProviderController extends Controller
{

    public function index()
    {
      return view('providers.index');
    }


    public function create()
    {
      return view('providers.create');
    }


    public function store(saveProviderRequest $request)
    {
      Provider::create($request->all());
      return redirect('providers')->with([swal()->autoclose(1500)->success('Registro Exitoso!', 'Se ha registrado un nuevo proveedor')]);
    }


    public function providersList(Request $request)
    {
      $providers = Provider::select('providers.*')->get();
      return DataTables::of($providers)
      ->addColumn('action', function($id){
        if ($id->status == 0) {
          $button = '<a href="/providers/'.$id->id.'/edit" class="btn btn-md btn-outline-info"><i class="fa fa-edit"></i></a>
          <a href="/providers/status/'.$id->id.'/1" class="btn btn-md btn-outline-success"><i class="fa fa-check-circle"></i></a>';
        }
        else if ($id->status == 1) {
          $button =  '<a href="/providers/'.$id->id.'/edit" class="btn btn-md btn-outline-info"><i class="fa fa-edit"></i></a>
          <a href="/providers/status/'.$id->id.'/0" class="btn btn-md btn-outline-danger"><i class="fa fa-ban"></i></a>';
        }
        return $button;
      })->editColumn('status', function ($id)
      {
        if ($id->status == 1) {
          return 'activo';
        }
        else {
          return 'inactivo';
        }
      })
      ->make(true);
    }


    public function edit($id)
    {
      $provider = Provider::findOrFail($id);
      return view('providers.edit', compact('provider'));
    }


    public function update(updateProviderRequest $request, $id)
    {
      $provider = Provider::findOrFail($id);
      $provider->update($request->all());
      return redirect('providers')->with([swal()->autoclose(1500)->success('Actualización Exitosa!', 'Se ha actualizado el registro')]);
    }

    public function status($id, $status)
    {
      $funciono = Provider::whereid($id)->update(["status" => $status]);
      return redirect('providers')->with([swal()->autoclose(1500)->success('Actualización Exitosa!', 'El estado ha sido actualizado')]);
    }

}
