<?php

namespace App\Http\Controllers;

use App\Models\ProductionOrders;
use App\Models\ProductionHasProducts;
use App\Models\Characterization;
use App\Models\ProductsHasContracts;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
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
            return redirect('Production_orders')->with([swal()->autoclose(1500)->error('Solicitud Fallida', 'Hubo un error al realizar el pedido')]);
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

       $data = ProductionOrders::select('center_production_orders.*')->

       get();
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
        else if ($id->status == 0){
            return "Rechazado";
        }
       })->editColumn('file_number', function ($id)
       {
        if ($id->files_id == null) {

            return "sin asignar";
        }
        else {
            $data2 = ProductionOrders::select('center_production_orders.*','files.file_number')->
            join('files','files.id','=','center_production_orders.files_id')->get();
            return $data2[0]['file_number'];
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
               $bot = '<a href="productionCenter/remission/'.$id->id.'" class="btn btn-outline-danger" data-toggle="tooltip" title="Descargar Remision." style="text-decoration : none;"><i class="far fa-file-pdf "></i> </a>
               <a  onclick="changeStatusProductionOrder('.$id->id.', 4 )" class="btn btn-md btn-outline-success text-success" data-toggle="tooltip" title="Entregar el pedido."><i class="fa fa-check-circle"></i></a>
               <a  onclick="changeStatusProductionOrder('.$id->id.', 0 )" class="btn btn-md btn-outline-danger text-danger" data-toggle="tooltip" title="Cancelar solicitud de taller."><i class="fa fa-ban"></i></a>';
           }
           if ($id->status == 4) {
               $bot = '<a href="productionCenter/remission/'.$id->id.'" class="btn btn-outline-danger" data-toggle="tooltip" title="Descargar Remision." style="text-decoration : none;"><i class="far fa-file-pdf "></i>
               </a> <input type="checkbox" id="checkbox'.$id->id.'" class="checkbox"  name="factura[]" value="'.$id->id.'" />
               <label for="checkbox'.$id->id.'"><span></span></label>';
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
        if ($status == 4) {
            $var =  ProductionHasProducts::select('center_production_has_products.*')->where('center_production_orders_id',$id)->get();
            $var->groupBy('products_id')->each(function ($key)
            {
                $stockQuantity = ProductsHasContracts::where('products_id',$key[0]['products_id'])
                ->select('quantity')
                ->first();
                $newQuantity = $stockQuantity['quantity']-$key[0]['quantity'];
                ProductsHasContracts::where('products_id',$key[0]['products_id'])->update(['quantity'=>$newQuantity]);
            });
        }

        return response()->json($validate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productionOrders  $productionOrders
     * @return \Illuminate\Http\Response
     */
    public function orderRemission($id)
    {

        $query = ProductionOrders::where('center_production_orders.id',$id)->
        select('center_production_orders.*','products.product_name','center_production_has_products.quantity','products_has_contracts.unit_price','taxes.tax','measure_unit.measure_name')->
        join('center_production_has_products','center_production_orders_id', '=' ,'center_production_orders.id')->
        join('products','products.id', '=' , 'center_production_has_products.products_id')->
        join('measure_unit','products.id_measure_unit','=','measure_unit.id')->
        join('products_has_contracts','products_has_contracts.products_id','=','products.id')->
        join('taxes','taxes.id','=','products_has_contracts.taxes_id')->
        get();
        // dd($query);
        $cost = $query->pluck('cost');
        $pdf = PDF::loadView('reports.productionRemission', compact('query','cost'));
        return $pdf->stream();

    }

    public function selectedOrderRemission(Request $request)
    {

        if ($request->has('factura')) {
            $array = collect([]);
        $grouped = collect([]);
        $totalCost = 0;
        $suma = 0;
        foreach ($request['factura'] as $key => $value)
        {
            $query = ProductionOrders::where('center_production_orders.id',$value)->
            select('center_production_orders.cost','products.product_name','center_production_has_products.quantity','center_production_has_products.products_id','products_has_contracts.unit_price','taxes.tax','measure_unit.measure_name')->
            join('center_production_has_products','center_production_orders_id', '=' ,'center_production_orders.id')->
            join('products','products.id', '=' , 'center_production_has_products.products_id')->
            join('measure_unit','products.id_measure_unit','=','measure_unit.id')->
            join('products_has_contracts','products_has_contracts.products_id','=','products.id')->
            join('taxes','taxes.id','=','products_has_contracts.taxes_id')->
            get();

            foreach ($query as $key => $value) {
                $array->push(['product_name' => $query[$key]['product_name'], 'quantity' => $query[$key]['quantity'],'measure' => $query[$key]['measure_name'], 'unit_price' => $query[$key]['unit_price'], 'tax' => $query[$key]['tax']]);
            }
            $totalCost += $query[0]['cost'];
        }


    //    $array->groupBy('product_name')->each(function ($value, $key)
    //       {
    //          $grouped[] = ['product_name' => $value[0]['product_name'], 'quantity' => $value->sum('quantity'),'measure' => $value[0]['measure'], 'unit_price' => $value[0]['unit_price'], 'tax' => $value[0]['tax']];
    //          dump($grouped);
    //       });
    //       dd($grouped);

        foreach ($array->groupBy('product_name') as $key => $value) {
            $grouped->push(['product_name' => $value[0]['product_name'], 'quantity' => $value->sum('quantity'),'measure' => $value[0]['measure'], 'unit_price' => $value[0]['unit_price'], 'tax' => $value[0]['tax']]);
        }


        $pdf = PDF::loadView('reports.selectedProductionRemissions', compact('grouped','totalCost'));
        return $pdf->stream();

        }
        else {
            return back()->with([swal()->autoclose(1500)->error('Error', 'Debe seleccionar al menos una orden.')]);
        }

    }

}
