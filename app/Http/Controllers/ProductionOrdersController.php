<?php

namespace App\Http\Controllers;

use App\Models\productionOrders;
use App\Models\Characterization;
use Illuminate\Http\Request;
use Auth;
use DataTables;

class ProductionOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.leaderorder');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $characterization_id = Characterization::select('id')->where('characterization_name','Producción de Centro')->get()->first();
        $response = productionOrders::Create([
            'characterizations_id' => $characterization_id->id, 
            'description' => $request['description'], 
            'pax' => $request['quantity'], 
            'user_name' => Auth::user()->name.' '.Auth::user()->last_name,
            'order_date' => $request['order_date'],
            'title' => $request['title']
            ]);
        if ($response) {
            return redirect('Production_orders')->with([swal()->autoclose(1500)->success('Solicitud Éxitosa!', 'Se ha realizado el pedido con exito')]);
        }
        else {
            return redirect('Production_orders')->with([swal()->autoclose(1500)->success('Solicitud Fallida', 'Hubo un error al realizar el pedido')]);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productionOrders  $productionOrders
     * @return \Illuminate\Http\Response
     */
    public function dataTable()
    {
       $data = ProductionOrders::select('center_production_orders.*')->get();
       return DataTables::of($data)->editColumn('status', function ($id)
       {
        if ($id->status == 1) {
            return "Solicitado";
        }
        else if($id->status == 2){
            return "Modificado";
        }
        else if($id->status == 3){
            return "Solicitado al proveedor";
        }
        else if ($id->status == 4) {
            return "Entregado";
        }
       })->addColumn('action', function ($id)
       {
           if ($id->status == 1) {
               $bot = '<a onclick="productionOrderModal('.$id->id.')" data-toggle="tooltip" title="Modificar taller solicitado" class="btn btn-md btn-outline-info text-info"><i class="fa fa-edit"></i></a>
               <a  onclick="changeStatusProductionOrder('.$id->id.', 0 )" class="btn btn-md btn-outline-danger text-danger" data-toggle="tooltip" title="Cancelar solicitud de taller."><i class="fa fa-ban"></i></a>';
           }
           if ($id->status == 2) {
               $bot = '<a onclick="productionOrderModal('.$id->id.')" data-toggle="tooltip" title="Modificar taller solicitado" class="btn btn-md btn-outline-info text-info"><i class="fa fa-edit"></i></a>
               <a  onclick="changeStatusProductionOrder('.$id->id.', 3 )" class="btn btn-md btn-outline-success text-success" data-toggle="tooltip" title="Solicitar al proveedor."><i class="fa fa-check-circle"></i></a>
               <a  onclick="changeStatusProductionOrder('.$id->id.', 0 )" class="btn btn-md btn-outline-danger text-danger" data-toggle="tooltip" title="Cancelar solicitud de taller."><i class="fa fa-ban"></i></a>';
           }
           if ($id->status == 3) {
               $bot = '<a  onclick="changeStatusProductionOrder('.$id->id.', 4 )" class="btn btn-md btn-outline-success text-success" data-toggle="tooltip" title="Entregar el pedido."><i class="fa fa-check-circle"></i></a>
               <a  onclick="managmentOrder('.$id->id.', 0 )" class="btn btn-md btn-outline-danger text-danger" data-toggle="tooltip" title="Cancelar solicitud de taller."><i class="fa fa-ban"></i></a>';
           }
           if ($id->status == 4) {
               $bot = '';
           }
           if ($id->status == 0) {
               $bot = '';
           }
           return $bot;
       })
       ->make(true); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productionOrders  $productionOrders
     * @return \Illuminate\Http\Response
     */
    public function edit(productionOrders $productionOrders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productionOrders  $productionOrders
     * @return \Illuminate\Http\Response
     */
    public function update($id, $status)
    {
        $validate = productionOrders::whereid($id)->update(["status" => $status]); 
        // dd($validate,$status);
        return response()->json($validate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productionOrders  $productionOrders
     * @return \Illuminate\Http\Response
     */
    public function destroy(productionOrders $productionOrders)
    {
        //
    }
}
